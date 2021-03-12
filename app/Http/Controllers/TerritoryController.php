<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use Illuminate\Http\Request;

class TerritoryController extends Controller
{
    public function index()
    {
        return Territory::where('level', 1)->orderBy('type', 'DESC')->orderBy('name', 'ASC')->get();
    }

    public function children($territoryId)
    {
        return Territory::where('territory_id', $territoryId)->orderBy('type', 'DESC')
        ->orderBy('name', 'ASC')->get();
    }

    public function parent(Territory $territoryId)
    {
        $parent = Territory::where('id', $territoryId->territory_id)->first();
        if ($parent) {
            return response()->json($parent->id);
        }
        return response()->json();
    }
//    public function territoriesWithSimilarNameParents(Territory $territory)
//    {
//        $regions = Territory::where('name', $territory->name)->get();
//        dd($regions);
//        return Territory::where('type' , '')->where('level_1_id', $level1)->get();
//    }
}
