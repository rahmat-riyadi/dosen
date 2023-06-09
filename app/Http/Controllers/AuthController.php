<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Carbon\Exceptions\Exception;
use Error;
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

    public function registerUser(Request $request){

        try {

            if($request->status == 'mahasiswa'){

                $flag = Mahasiswa::where('nim', $request->nip)->first();

                if(!empty($flag)){
                    return redirect('/login')->with('message', 'nim sudah terdaftar');
                }

                Mahasiswa::create([
                    'nama' => $request->nama,
                    'nim' => $request->nip,
                    'password' => bcrypt($request->password),
                    'semester' => $request->semester,
                    'judul' => $request->judul
                ]);
    
            } else {

                $request->validate([
                    'nip' => 'unique:dosen'
                ],[
                    'nip.unique' => 'nip sudah terdaftar'
                ]);
    
                Dosen::create([
                    'nama' => $request->nama,
                    'nip' => $request->nip,
                    'password' => bcrypt($request->password),
                ]);
    
            }

            return redirect('/login')->with('message', 'Registrasi berhasil');

        } catch (\Exception $e){

            return redirect('/login')->with('message', $e->getMessage());

        }


    }

}
