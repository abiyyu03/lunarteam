<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelumas;

class PelumasController extends Controller
{
    function index()
    {
        $pelumasData = Pelumas::paginate(5);
        return view('pages.pelumas.index',compact('pelumasData'));
    }

    function create()
    {
        return view('pages.pelumas.create');
    }

    function store(Request $request)
    {
        $pelumasData = new Pelumas();
        $pelumasData->nama_pelumas = $request->nama_pelumas;
        $pelumasData->save();

        return redirect()->to('/pelumas')->with('success','Data Berhasil Disimpan !');
    }


    function edit($id)
    {
        $petugasData = Petugas::get();
        $pelumasData = Pelumas::get();
        $gantiPelumasData = GantiPelumas::with('petugas','pelumas')->find($id);
        return view('pages.pelumas.edit',compact('petugasData','pelumasData','gantiPelumasData'));
    }

    function update($id, Request $request)
    {
        $pelumasData = Pelumas::find($id);
        $pelumasData->nama_pelumas = $request->nama_pelumas; 
        $pelumasData->save();

        return redirect()->to('/pelumas')->with('success','Data Berhasil Disimpan !');
    }

    function delete($id)
    {
        $pelumasData = Pelumas::find($id);
        $pelumasData->delete();

        return redirect()->to('/pelumas')->with('success','Data Berhasil Dihapus !');
    }
}
