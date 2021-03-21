<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\District;
use App\Models\Region;
use App\Models\Settlement;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Request as RM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{

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
                $request->validated(),
                ['password' => Hash::make(env('AZURE_DEFAULT_PASSWORD'))]
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

    public function deactivate()
    {
        Auth::user()->deactivate();
        Auth::logout();
        return redirect("/")->with('message', 'Ви деактувували всій акаунт');
    }

    public function profile()
    {
        return view('user/profile')->with('user', Auth::user())->with('requests', RM::where('user_id', Auth::id())->paginate(16))->with('title', 'Профіль');
    }
}
