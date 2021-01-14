<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
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
        $regions = Region::all();
        return view('user/create')->with('regions', $regions);
    }
    public function store(UserCreateRequest $request)
    {
        User::create(
            array_merge(
                $request->validated(),
                ['password' => Hash::make($request->password)]
            )
        );
        return redirect('/admin')->with('message', 'Користувач успішно створений!');
    }

    public function edit(User $user)
    {
        $regions = Region::all();
        $districts = District::where('region_id', $user->region_id)->get();
        $settlements = Settlement::where('district_id', $user->district_id)->get();
        return view('admin/edit', ['user' => $user])->with('regions', $regions)->with('districts', $districts)->with('settlements', $settlements);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin')->with('message', 'Користувач успішно змінен!');
    }

    public function profile()
    {
        return view('user/profile')->with('user', Auth::user())->with('requests', RM::where('user_id', Auth::id())->paginate(16));
    }
}
