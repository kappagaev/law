<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreRequest;
use App\Mail\RequestCreateMail;
use App\Models\District;
use App\Models\Region;
use App\Models\Request as RM;
use App\Models\Settlement;
use App\Models\ViolationSphere;
use App\Models\ViolationType;
use App\Services\RequestSearchService;
use Illuminate\Http\Request;
use App\Services\DocxService;
use App\Services\FileService;
use App\Services\RequestMailService;
use App\Services\RequestService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class RequestController
 * @package App\Http\Controllers
 */
class RequestController extends Controller
{
    /**
     * RequestController constructor.
     */
    public function __construct()
    {
        $this->middleware('author')->only(['create', 'store']);
    }

    public function index(Request $request, RequestSearchService $search)
    {

       $requests = $search->setValues($request->only(
                           ['region_id', 'district_id', 'settlement_id', 'violation_sphere_id', 'violation_type_id']
                       ))
                        ->setTimestamps($request->only( 'created_at', 'violation_time'))
                        ->get();
           ;

       $spheres = ViolationSphere::all();
       $regions = Region::all();

       $view = view('request/list')->with('requests', $requests)
           ->with('title', 'Пропозиції')
           ->with('spheres', $spheres)
           ->with('regions', $regions);
       if($request->region_id) {
           $view->with('districts', District::where('region_id', $request->region_id)->get());
       }
       if($request->district_id) {
           $view->with('settlements', Settlement::where('district_id', $request->district_id)->get());
       }

        if($request->violation_sphere_id) {
            $view->with('types', ViolationType::where('violation_sphere_id', $request->violation_sphere_id)->get());
        }
       return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spheres = ViolationSphere::all();
        $regions = Region::all();
        return view('request/create')->with('title', 'Створити пропозицію')
            ->with('spheres', $spheres)
            ->with('regions', $regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RequestStoreRequest $request
     * @param RequestService $service
     * @param RequestMailService $requestMailService
     * @param FileService $fileService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(RequestStoreRequest $request, RequestService $service, RequestMailService $requestMailService,FileService $fileService)
    {
        $rm = $service->create($request->validated(), auth::id(), $request->checkboxes);

        $files = $fileService->storeRequestFiles($request, [
            'photocopy',
            'audio',
            'video',
            'reg_photocopy'
        ],"request_$rm->id");

        $requestMailService->created($rm, $files);

        $docxTemplate = new DocxService('template.docx', 'request_' . $rm->id);

        $docx = $docxTemplate
            ->setValues(array_map(function ($fileArray) {
                $fileArray = array_map(function ($val) {
                    return substr($val, strpos($val, "/") + 1);
                }, $fileArray);

                return implode(', ', $fileArray);
            }, $files))
            ->handleRequestModel($rm)
            ->save()
            ->getName();

        Mail::to(config('mail.REQUEST_CREATED_MAIL_TO'))->send(new RequestCreateMail($rm, $docx, $files));

        return redirect('/')->with('message', 'успішно створено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(RM $request)
    {
        return view('request/single')->with('request', $request)->with('title', 'Пропозиція ' . $request->title);
    }

    public function search(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function edit(Request $request)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Request $request)
    // {
    //     //
    // }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//     public function destroy(RM $request)
//     {
//         //$request->delete();
//         return redirect('/')->with('message', 'Успішно видалено');
//     }
}
