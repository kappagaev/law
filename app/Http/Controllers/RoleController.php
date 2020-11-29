<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(Role::all()->toArray());
    }

    public function show(Role $patient)
    {
        return response()->json($patient->toArray());
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        return response()->json($role->toArray());
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return Response::noContent();
    }
}
