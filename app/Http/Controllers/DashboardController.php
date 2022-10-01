<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pelumas, GantiPelumas, Cleaning, Tightening, Petugas};

class DashboardController extends Controller
{
    function index()
    {
        $petugasData = Petugas::count(); 
        $gantiPelumasData = GantiPelumas::count(); 
        $cleaningData = Cleaning::count(); 
        $tighteningData = Tightening::count(); 
        return view('pages.dashboard',compact('petugasData','gantiPelumasData','cleaningData','tighteningData'));
    }
}
