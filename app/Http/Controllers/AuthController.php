<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Alert;

class AuthController extends Controller
{
    function login()
    {
        if(Auth()->check()){
            return redirect()->back();
        }
        return view('pages.auth.login');
    }

    function loginProcess(Request $request)
    {
        $data = $request->only('username','password');
        // dd($data);
        if(Auth()->attempt($data)){
            Alert::success('Sukses','Login berhasil !');
            return redirect()->to('/');
        }
        // Alert::success('Gagal','Username atau Password salah !');
        return redirect()->back()->with('failed','Username atau Password salah !');
    }

    function logout()
    {
        Auth()->logout();
        return redirect()->to('/login');
    }
}
