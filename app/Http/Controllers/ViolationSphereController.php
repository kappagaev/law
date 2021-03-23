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

    public function edit(ViolationSphere $sphere)
    {
        return view('request_sphere/edit', ['sphere' => $sphere]);
    }

    public function update(Request $request, ViolationSphere $sphere)
    {
        $sphere->update($request->all());

        return redirect('admin/violation/sphere')->with('message', 'Успіншо редаговано!');
    }


    public function destroy(ViolationSphere $sphere)
    {
        $sphere->delete();

        return redirect('admin/violation/sphere')->with('message', 'Успіншо видалено!');
    }

    public function index()
    {
        $spheres = ViolationSphere::paginate(32);
        return view('request_sphere/panel')->with('spheres', $spheres)->with('title', 'Адмінка');
    }

    public function spheres()
    {
        return ViolationSphere::orderBy('description')->get();
    }
}
