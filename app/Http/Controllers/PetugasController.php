<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    function index()
    {
        $petugasData = Petugas::get();
        return view('pages.petugas.index',compact('petugasData'));
    }

    function create()
    {
        return view('pages.petugas.create');
    }

    function store(Request $request)
    {
        $petugasData = new Petugas();
        $petugasData->nama_petugas = $request->nama_petugas;
        $petugasData->save();

        return redirect()->to('/petugas')->with('success','Data Berhasil Disimpan !');
    }

    function delete($id)
    {
        $petugasData = Petugas::find($id);
        $petugasData->delete();
        return redirect()->to('/petugas')->with('success','Data Berhasil Dihapus !');
    }
}
