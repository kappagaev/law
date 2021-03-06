<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserEditController extends Controller
{
    public function edit()
    {
        return view('user/edit', ['user' => Auth::user()])->with('title', 'Редагувати профіль');;
    }

    public function update(UserEditRequest $request)
    {
        Auth::user()->update($request->validated());

        return redirect('/')->with('message', 'Інформація користувача успішно змінена');
    }

}
