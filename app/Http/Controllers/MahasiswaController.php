<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{

    protected $folder;

    public function __construct()
    {
        $this->folder = 'mahasiswa.';
    }

    public function index(){

        $schedule = Auth::user()->jadwal;

        $schedule = $schedule->map(function($key, $val){

            return [ 
                'id' => $val+1,
                'calendarId' => 'cal'.$val+1,
                'title' => 'Pertemuan '. $key->pivot->pertemuan,
                'start' => $key->pivot->tanggal . ' ' . $key->pivot->waktu,
                'end' => $key->pivot->tanggal . ' ' . $key->pivot->waktu,
                'status' => $key->pivot->status,
                'isReadOnly' => true,
                'attendees' => [$key->nama],
                'state' => $key->pivot->catatan ?? ''  
            ];
        });

        return view($this->folder.'index', compact('schedule'));
    }

    public function test(){
        return view($this->folder.'index-registered');
    }

    public function storeSK(Request $request){

        $mahasiswa = Mahasiswa::find();

        $file = $request->file('image')->store('sk');


        try {

            $mahasiswa->bimbingan1()->attach($request->dosen_1,[
                'dosen_2_id' => $request->dosen_2,
                'file' => $file
            ]);

            $msg = 'SK berhasil diupload';

        } catch (\Exception $e){

            $msg = $e->getMessage();

        }


        return redirect()->with('message', $msg);


    }
}
