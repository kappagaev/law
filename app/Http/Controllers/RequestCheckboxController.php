<?php

namespace App\Http\Controllers;

use App\Models\ViolationType;
use App\Models\ViolationTypeCheckbox;
use Illuminate\Http\Request;

class RequestCheckboxController extends Controller
{
    public function get(ViolationType $violationType)
    {
        return $violationType->checkboxes;
    }

    public function create(ViolationType $violationType)
    {
        return view('violation_type_checkbox/create')->with('violationType', $violationType);
    }

    public function store(Request $request)
    {
        ViolationTypeCheckbox::create($request->all());

        return back()->with('message', 'Успішно створено!');
    }
}
