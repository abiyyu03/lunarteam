<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

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
            return redirect()->to('/');
        }
        return redirect()->back();
    }

    function logout()
    {
        Auth()->logout();
        return redirect()->to('/login');
    }
}
