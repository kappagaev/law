<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RequestStatusIsPublic;
use App\Http\Requests\RequestFilesStoreRequest;
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
        $this->middleware(RequestStatusIsPublic::class)->only('show');
    }

    public function index(Request $request, RequestSearchService $search)
    {

       $requests = $search->setValues($request->only(
                           ['region_id', 'district_id', 'settlement_id', 'violation_sphere_id', 'violation_type_id', 'territory_id']
                       ))
                        ->setTimestamps($request->only( 'created_at', 'violation_time'))
                        ->get();


        return view('request/list')->with('requests', $requests)
            ->with('title', 'Пропозиції');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request/create')->with('title', 'Створити пропозицію');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RequestStoreRequest $request
     * @param RequestFilesStoreRequest $filesRequest
     * @param RequestService $service
     * @param RequestMailService $requestMailService
     * @param FileService $fileService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \PhpOffice\PhpWord\Exception\CopyFileException
     * @throws \PhpOffice\PhpWord\Exception\CreateTemporaryFileException
     */
    public function store(RequestStoreRequest $request, RequestService $service, RequestMailService $requestMailService)
    {
        $rm = $service->create($request, auth::id(), $request->checkboxes);

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
}
