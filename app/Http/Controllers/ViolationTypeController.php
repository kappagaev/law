<?php

namespace App\Http\Controllers;

use App\Models\ViolationSphere;
use App\Models\ViolationType;
use App\Models\ViolationTypeCheckbox;
use Illuminate\Http\Request;

class ViolationTypeController extends Controller
{
    public function create()
    {
        $spheres = ViolationSphere::all();
        return view('request_type/create')->with('spheres', $spheres);
    }

    public function index()
    {
        $types = ViolationType::with('sphere')->paginate(32);
        //dd($types);
        return view('request_type/panel')->with('types', $types)->with('title', 'Адмінка');
    }

    public function store(Request $request)
    {
        ViolationType::create($request->all());

        return back()->with('message', 'Успіншо створенно!');
    }

    public function edit(ViolationType $type)
    {
        return view('request_type/edit', ['type' => $type, 'spheres' => ViolationSphere::all()]);
    }

    public function update(Request $request, ViolationType $type)
    {
        $type->update($request->all());

        return redirect('admin/violation/type')->with('message', 'Успіншо редаговано!');
    }


    public function destroy(ViolationType $type)
    {
        $type->delete();

        return back()->with('message', 'Успіншо видалено!');
    }

    public function show(ViolationType $type)
    {
        return view('request_type/single')->with('violationType', $type);
    }

    public function sphereTypes(ViolationSphere $violationSphere)
    {
        return ViolationType::where('violation_sphere_id', $violationSphere->id)->orderBy('description')->get();
    }
}
