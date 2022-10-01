<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tightening, Petugas};

class TighteningController extends Controller
{
    function index()
    {
        $tighteningData = Tightening::with('petugas')->paginate(10);
        return view('pages.tightening.index',compact('tighteningData'));
    }

    function create()
    {
        $petugasData = Petugas::get();
        return view('pages.tightening.create',compact('petugasData'));
    }

    function store(Request $request)
    {
        
        $tighteningData = new Tightening();
        $tighteningData->tanggal = $request->tanggal;
        $tighteningData->equipment = $request->equipment;
        $tighteningData->pekerjaan = $request->pekerjaan;
        $tighteningData->petugas_id = $request->petugas_id; 
        $tighteningData->save();

        return redirect()->to('/tightening')->with('success','Data Berhasil Disimpan !');
    }

    function edit($id)
    {
        $petugasData = Petugas::get();
        $tighteningData = Tightening::with('petugas')->find($id);
        return view('pages.tightening.edit',compact('petugasData','tighteningData'));
    }

    function update($id, Request $request)
    {
        
        $tighteningData = Tightening::with('petugas')->find($id);
        $tighteningData->tanggal = $request->tanggal;
        $tighteningData->equipment = $request->equipment;
        $tighteningData->pekerjaan = $request->pekerjaan;
        $tighteningData->petugas_id = $request->petugas_id; 
        $tighteningData->save();

        return redirect()->to('/tightening')->with('success','Data Berhasil Diubah !');
    }

    function delete($id)
    {
        $tighteningData = Tightening::find($id);
        $tighteningData->delete();

        return redirect()->to('/tightening')->with('success','Data Berhasil Dihapus !');
    }
}
