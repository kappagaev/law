<?php

namespace App\Http\Controllers;

use App\Models\ViolationSphere;
use App\Models\ViolationType;
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

    public function show(ViolationType $violationType)
    {
        return view('request_type/single')->with('violationType', $violationType);
    }

    public function sphereTypes(ViolationSphere $violationSphere)
    {
        return $violationSphere->types;
    }
}
