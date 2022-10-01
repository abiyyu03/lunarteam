<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cleaning, Petugas};
use Image;

class CleaningController extends Controller
{
    function index()
    {
        $cleaningData = Cleaning::with('petugas')->paginate(10);
        return view('pages.cleaning.index',compact('cleaningData'));
    }

    function create()
    {
        $petugasData = Petugas::get();
        return view('pages.cleaning.create',compact('petugasData'));
    }

    function store(Request $request)
    {
        $imageBefore = $request->file('gambar_sebelum');
        $imageAfter = $request->file('gambar_sesudah');
        $this->uploadImageBefore($imageBefore);
        $this->uploadImageAfter($imageAfter);

        $cleaningData = new Cleaning();
        $cleaningData->tanggal = $request->tanggal;
        $cleaningData->equipment = $request->equipment;
        $cleaningData->pekerjaan = $request->pekerjaan;
        $cleaningData->petugas_id = $request->petugas_id; 
        $cleaningData->gambar_sebelum = $this->filenameBefore;
        $cleaningData->gambar_sesudah = $this->filenameAfter;
        $cleaningData->save();

        return redirect()->to('/cleaning')->with('success','Data Berhasil Disimpan !');
    }

    function edit($id)
    {
        $petugasData = Petugas::get();
        $cleaningData = Cleaning::find($id);
        return view('pages.cleaning.edit',compact('petugasData','cleaningData'));
    }

    function update($id, Request $request)
    {
        $imageBefore = $request->file('gambar_sebelum');
        $imageAfter = $request->file('gambar_sesudah');

        $imageIsNotEmpty = $imageBefore != NULL || $imageAfter != NULL;

        if($imageIsNotEmpty){
            $this->uploadImageBefore($imageBefore);
            $this->uploadImageAfter($imageAfter);
        }

        $cleaningData = Cleaning::with('petugas')->find($id);
        $cleaningData->tanggal = $request->tanggal;
        $cleaningData->equipment = $request->equipment;
        $cleaningData->pekerjaan = $request->pekerjaan;
        $cleaningData->petugas_id = $request->petugas_id; 
        if($imageIsNotEmpty){
            $cleaningData->gambar_sebelum = $this->filenameBefore;
            $cleaningData->gambar_sesudah = $this->filenameAfter;
        }
        $cleaningData->save();

        return redirect()->to('/cleaning')->with('success','Data Berhasil Diubah !');
    }

    function delete($id)
    {
        $cleaningData = Cleaning::find($id);
        $imageIsExist = file_exists(public_path().'/img/cleaning/'.$cleaningData->gambar_sebelum) || file_exists(public_path().'/img/cleaning/'.$cleaningData->gambar_sesudah);
        
        if($imageIsExist){
            unlink(public_path().'/img/cleaning/'.$cleaningData->gambar_sebelum);
            unlink(public_path().'/img/cleaning/'.$cleaningData->gambar_sesudah);
        }
        $cleaningData->delete();

        return redirect()->to('/cleaning')->with('success','Data Berhasil Dihapus !');
    }

    function uploadImageBefore($image)
    {
        $this->filenameBefore = $image->getClientOriginalName();

        $image->move(public_path().'/img/img_temp/',$this->filenameBefore);
        $image_compressed = Image::make(public_path().'/img/img_temp/'.$this->filenameBefore);
        // $image_compressed->fit(320,240);
        $image_compressed->save(public_path('/img/cleaning/'.$this->filenameBefore));
        unlink(public_path('/img/img_temp/'.$this->filenameBefore));
    }

    function uploadImageAfter($image)
    {
        $this->filenameAfter = $image->getClientOriginalName();

        $image->move(public_path().'/img/img_temp/',$this->filenameAfter);
        $image_compressed = Image::make(public_path().'/img/img_temp/'.$this->filenameAfter);
        // $image_compressed->fit(320,240);
        $image_compressed->save(public_path('/img/cleaning/'.$this->filenameAfter));
        unlink(public_path('/img/img_temp/'.$this->filenameAfter));
    }
}
