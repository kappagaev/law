<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ViolationSphere;
use Illuminate\Http\Request;

class ViolationSphereController extends Controller
{
    public function create()
    {
        return view('request_sphere/create');
    }

    public function store(Request $request)
    {
        ViolationSphere::create($request->all());

        return back()->with('message', 'Успіншо створенно!');
    }

    public function index()
    {
        $spheres = ViolationSphere::paginate(32);
        return view('request_sphere/panel')->with('spheres', $spheres)->with('title', 'Адмінка');
    }

    public function spheres()
    {
        return ViolationSphere::all();
    }
}
