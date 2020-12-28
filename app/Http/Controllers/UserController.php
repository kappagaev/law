<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Request as RM;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['show']);
    }

    public function index()
    {
        return response()->json(User::all()->toArray());
    }

    public function show(User $user)
    {
        return view('user/profile')->with('user', $user)->with('requests', RM::where('user_id', $user->id)->paginate(16));
    }

    public function create()
    {
        return view('user/create');
    }
    public function store(UserCreateRequest $request)
    {
        User::create(
            array_merge(
                $request->only('name', 'email', 'role_id'),
                ['password' => Hash::make($request->password)]
            )
        );
        return redirect('/admin')->with('message', 'Користувач успішно створений!');
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
