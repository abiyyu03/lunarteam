<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{GantiPelumas, Petugas, Pelumas, Equipment};
use Image;

class GantiPelumasController extends Controller
{
    function index()
    {
        $gantiPelumasData = GantiPelumas::with('pelumas','petugas','Equipment')->get();
        return view('pages.ganti_pelumas.index',compact('gantiPelumasData'));
    }

    function create()
    {
        $equipmentData = Equipment::get();
        $petugasData = Petugas::get();
        $pelumasData = Pelumas::get();
        return view('pages.ganti_pelumas.create',compact('petugasData','pelumasData','equipmentData'));
    }

    function store(Request $request)
    {
        $imageData = $request->file('gambar');
        $this->uploadImage($imageData);

        $gantiPelumasData = new GantiPelumas();
        $gantiPelumasData->tanggal = $request->tanggal;
        $gantiPelumasData->equipment_id = $request->equipment_id;
        $gantiPelumasData->pekerjaan = $request->pekerjaan;
        $gantiPelumasData->petugas_id = $request->petugas_id; 
        $gantiPelumasData->pelumas_id = $request->pelumas_id;
        $gantiPelumasData->catatan = $request->catatan;
        $gantiPelumasData->gambar = $this->filename;
        $gantiPelumasData->save();

        return redirect()->to('/ganti_pelumas')->with('success','Data Berhasil Disimpan !');
    }


    function edit($id)
    {
        $equipmentData = Equipment::get();
        $petugasData = Petugas::get();
        $pelumasData = Pelumas::get();
        $gantiPelumasData = GantiPelumas::with('petugas','pelumas')->find($id);
        return view('pages.ganti_pelumas.edit',compact('petugasData','pelumasData','gantiPelumasData','equipmentData'));
    }

    function update($id, Request $request)
    {
        $imageData = $request->file('gambar');
        $imageIsNotEmpty = $imageData != NULL;

        if($imageIsNotEmpty){
            $this->uploadImage($imageData);
        }

        $gantiPelumasData = GantiPelumas::with('petugas','pelumas')->find($id);
        $gantiPelumasData->tanggal = $request->tanggal;
        $gantiPelumasData->equipment_id = $request->equipment_id;
        $gantiPelumasData->pekerjaan = $request->pekerjaan;
        $gantiPelumasData->petugas_id = $request->petugas_id; 
        $gantiPelumasData->pelumas_id = $request->pelumas_id;
        $gantiPelumasData->catatan = $request->catatan;
        if($imageIsNotEmpty){
            $gantiPelumasData->gambar = $this->filename;
        }
        $gantiPelumasData->save();

        return redirect()->to('/ganti_pelumas')->with('success','Data Berhasil Disimpan !');
    }

    function delete($id)
    {
        $gantiPelumasData = GantiPelumas::find($id);
        if(file_exists(public_path().'/img/ganti_pelumas/'.$gantiPelumasData->gambar)){
            unlink(public_path().'/img/ganti_pelumas/'.$gantiPelumasData->gambar);
        }
        $gantiPelumasData->delete();

        return redirect()->to('/ganti_pelumas')->with('success','Data Berhasil Dihapus !');
    }
    
    function uploadImage($image)
    {
        $this->filename = $image->getClientOriginalName();

        $image->move(public_path().'/img/img_temp/',$this->filename);
        $image_compressed = Image::make(public_path().'/img/img_temp/'.$this->filename);
        // $image_compressed->fit(354,472);
        $image_compressed->save(public_path('/img/ganti_pelumas/'.$this->filename));
        unlink(public_path('/img/img_temp/'.$this->filename));
    }
}
