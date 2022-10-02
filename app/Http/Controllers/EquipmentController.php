<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    function index()
    {
        return view('pages.equipment.index');
    }

    function create()
    {
        return view('pages.equipment.create');
    }
}
