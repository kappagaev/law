<?php

namespace App\Http\Controllers;
// RM is stands for request model, since it conflicts with Http\Request
use App\Http\Requests\RequestStoreRequest;
use App\Models\Request as RM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('author')->only(['create', 'store']);
    }
    public function index()
    {
       $requests = RM::whereHas('user', function ($user) {
           $user->where('status', User::STATUS_NOT_BANNED);
        })->paginate(15);

       return view('request/list')->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RequestStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreRequest $request)
    {
        $request = new RM($request->all());
        // create observer when it will got bigger
        $request->user_id = Auth::id();
        $request->save();

        return redirect('/')->with('message', 'Успішно створено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(RM $request)
    {
        return view('request/single')->with('request', $request);
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
