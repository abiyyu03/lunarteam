<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlantArea;

class PlantAreaController extends Controller
{
    function index()
    {
        $plantAreaData = PlantArea::get();
        return view('pages.plant_area.index',compact('plantAreaData'));
    }

    function create()
    {
        return view('pages.plant_area.create');
    }

    function store(Request $request)
    {
        $plantAreaData = new PlantArea();
        $plantAreaData->plant_area = $request->plant_area;
        $plantAreaData->save();

        return redirect()->to('/plant_area')->with('success','Data Berhasil Disimpan !');
    }
}
