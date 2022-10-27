<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Equipment, PlantArea};

class EquipmentController extends Controller
{
    function index()
    {
        $equipmentData = Equipment::get();
        return view('pages.equipment.index',compact('equipmentData'));
    }

    function create()
    {
        $plantAreaData = PlantArea::get();
        return view('pages.equipment.create',compact('plantAreaData'));
    }

    function edit($id)
    {
        $plantAreaData = PlantArea::get();
        $equipmentData = Equipment::with('plant_area')->find($id);
        return view('pages.equipment.edit',compact('equipmentData','plantAreaData'));
    }

    function update($id, Request $request)
    {
        $equipmentData = Equipment::with('plant_area')->find($id);
        $equipmentData->equipment_code = $request->equipment_code;
        $equipmentData->equipment_description = $request->equipment_description;
        $equipmentData->plant_area_id = $request->plant_area_id;
        $equipmentData->frequency = $request->frequency;
        $equipmentData->sub_assets = $request->sub_assets;
        $equipmentData->quantity = $request->quantity;
        $equipmentData->save();

        return redirect()->to('/equipment')->with('success','Data Berhasil Disimpan !');
    }

    function store(Request $request)
    {
        $equipmentData = new Equipment();
        $equipmentData->equipment_code = $request->equipment_code;
        $equipmentData->equipment_description = $request->equipment_description;
        $equipmentData->plant_area_id = $request->plant_area_id;
        $equipmentData->frequency = $request->frequency;
        $equipmentData->sub_assets = $request->sub_assets;
        $equipmentData->quantity = $request->quantity;
        $equipmentData->save();

        return redirect()->to('/equipment')->with('success','Data Berhasil Disimpan !');
    }

    function delete($id)
    {
        $equipmentData = Equipment::with('plant_area')->find($id);
        $equipmentData->delete();

        return redirect()->to('/equipment')->with('success','Data Berhasil Dihapus !');
        
    }
}
