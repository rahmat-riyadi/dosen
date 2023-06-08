<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{

    protected $folder;

    public function __construct()
    {
        $this->folder = 'dosen.';
    }

    public function index(){

        $mahasiswas = DB::table('bimbingan')
                    ->join('dosen', function($join){
                        $join->on('dosen.id', '=', 'bimbingan.dosen_1_id')
                        ->orWhere('dosen.id', '=', 'bimbingan.dosen_2_id');
                    })
                    ->join('mahasiswa', 'mahasiswa.id', '=', 'bimbingan.mahasiswa_id')
                    ->get([
                        'mahasiswa.nama as nama',
                        'mahasiswa.nim as nim',
                        'bimbingan.judul as judul',
                        'bimbingan.file as file'
                    ]);

        $schedule = Auth::user()->jadwal;

        $schedule = $schedule->map(function($key, $val){

            $judul = DB::table('bimbingan')->where('mahasiswa_id', $key->id)->first('judul');

            return [ 
                'id' => $val+1,
                'calendarId' => 'cal'.$val+1,
                'title' => 'Pertemuan '. $key->pivot->pertemuan,
                'start' => $key->pivot->tanggal . ' ' . $key->pivot->waktu,
                'end' => $key->pivot->tanggal . ' ' . $key->pivot->waktu,
                'status' => $key->pivot->status,
                'isReadOnly' => true,
                'attendees' => [$key->nama],
                'state' => 'Judul : '.$judul->judul,
            ];
        });

        return view($this->folder.'index', compact('mahasiswas', 'schedule'));
    }

    public function bimbingan(){

        $mahasiswas = DB::table('bimbingan')
            ->join('dosen', function($join){
                $join->on('dosen.id', '=', 'bimbingan.dosen_1_id')
                ->orWhere('dosen.id', '=', 'bimbingan.dosen_2_id');
            })
            ->join('mahasiswa', 'mahasiswa.id', '=', 'bimbingan.mahasiswa_id')
            ->get([
                'mahasiswa.id as id',
                'mahasiswa.nama as nama',
                'mahasiswa.nim as nim',
                'bimbingan.judul as judul',
                'bimbingan.file as file'
            ]);

        return view($this->folder.'bimbingan', compact('mahasiswas'));
    }

    public function detail($id){

        $mahasiswa = Mahasiswa::find($id);
        $judul = DB::table('bimbingan')->where('mahasiswa_id', $id)->first(['judul', 'file']);

        $jadwal = DB::table('jadwal')
                    ->join('dosen', function($join){
                        $join->on('dosen.id', '=', 'jadwal.dosen_id')
                        ->where('dosen.id', '=', auth()->user()->id);
                    })
                    ->join('mahasiswa', function($join) use ($id) {
                        $join->on('mahasiswa.id', '=', 'jadwal.mahasiswa_id')
                        ->where('mahasiswa.id', '=', $id);
                    })
                    ->get([
                        'jadwal.id as id',
                        'jadwal.pertemuan as pertemuan',
                        'jadwal.waktu as waktu',
                        'jadwal.tanggal as tanggal',
                        'jadwal.catatan as catatan',
                        'jadwal.status as status',
                        'jadwal.file as file',
                    ]);

        return view($this->folder.'detail', compact('jadwal', 'mahasiswa', 'judul'));
    }
}
