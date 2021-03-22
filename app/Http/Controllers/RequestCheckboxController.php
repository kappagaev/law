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

    public function edit(ViolationTypeCheckbox $checkbox)
    {
        return view('violation_type_checkbox/edit', [
            'checkbox' => $checkbox
        ]);
    }

    public function update(Request $request, ViolationTypeCheckbox $checkbox)
    {
        $checkbox->update($request->all());

        return redirect('admin/violation/type/' . $checkbox->violationType->id)->with('message', 'Успіншо редаговано!');
    }


    public function destroy(ViolationTypeCheckbox $checkbox)
    {
        $checkbox->delete();

        return back()->with('message', 'Успіншо видалено!');
    }
}
