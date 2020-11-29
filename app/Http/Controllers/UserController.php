<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['edit', 'update']);
    }

    public function index()
    {
        return response()->json(User::all()->toArray());
    }

    public function show(User $user)
    {
        return view('user/profile')->with('user', $user);
    }

    public function create()
    {
        return view('user/create');
    }
    public function store(UserCreateRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->role_id = 1;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/')->with('message', 'Користувач успішно створен!');
    }

    public function edit(User $user)
    {
        return view('admin/edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());


        return redirect()->route('admin')->with('message', 'Користувач успішно змінен!');
    }

}
