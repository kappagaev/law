<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreRequest;
use App\Mail\RequestCreateMail;
use App\Models\Request;
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

    public function index()
    {
       $requests = Request::whereUserIsNotBanned()
           ->latest()
           ->paginate(16);

       return view('request/list')->with('requests', $requests)->with('title', 'Пропозиції');
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
     * @param RequestService $service
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreRequest $request, RequestService $service)
    {
        $request = $service->create(array_merge(
            $request->only('title', 'content'),
            ['user_id' => Auth::id()]
        ));
        // make an event
        Mail::to(config('mail.REQUEST_CREATED_MAIL_TO'))->send(new RequestCreateMail($request));
        return redirect('/')->with('message', 'Успішно створено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('request/single')->with('request', $request)->with('title', 'Пропозиція ' . $request->title);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function destroy(RM $request)
     {
         $request->delete();
         return redirect('/')->with('message', 'Успішно видалено');
     }
}
