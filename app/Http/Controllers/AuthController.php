<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function logout(Request $request){

        Auth::guard('mahasiswa')->logout();
        Auth::guard('dosen')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}