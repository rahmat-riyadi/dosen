<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    protected $folder;

    public function __construct()
    {
        $this->folder = 'admin.';
    }

    public function index(){
        $dosenPending = Dosen::whereIsActive(null)->get();
        $mahasiswaPending = Mahasiswa::whereIsActive(null)->get();

        $dosenAccepted = Dosen::whereIsActive(true)->get();

        foreach($dosenAccepted as $i => $item){
            $item->bimbingan = DB::table('bimbingan')
                ->where('dosen_1_id', $item->id)
                ->orWhere('dosen_2_id', $item->id)
                ->count();
        }

        return view("$this->folder.index", compact('dosenPending', 'mahasiswaPending', 'dosenAccepted'));
    }

    public function mahasiswaBimbingan($id){
        $mahasiswas = DB::table('bimbingan')
                        ->where('dosen_1_id', $id)
                        ->orWhere('dosen_2_id', $id)
                        ->join('mahasiswa', 'mahasiswa.id', '=', 'bimbingan.mahasiswa_id')
                        ->get();
        $dosen_id = $id;
        $dosen = Dosen::find($dosen_id);

        return view("$this->folder.mahasiswa-bimbingan", compact('mahasiswas', 'dosen_id', 'dosen'));
    }

    public function detailMahasiswa($dosen_id, $mahasiswa_id){

        $mahasiswa = Mahasiswa::find($mahasiswa_id);

        // $dosen = Dosen::find($dosen_id);

        $jadwal = DB::table('jadwal')
                        ->where('dosen_id', $dosen_id)
                        ->where('mahasiswa_id', $mahasiswa_id)
                        ->get();

        $bimbingan = DB::table('bimbingan')->where('mahasiswa_id', $mahasiswa_id)->first();

        return view("$this->folder.detail", compact('jadwal', 'mahasiswa', 'bimbingan'));
    }

    public function accAccount($id){

        $status = request()->query('status');
        $acc = request()->query('acc');

        try {

            if($status == 'mahasiswa'){
                Mahasiswa::find($id)->update(['is_active' => $acc == 'acc' ? true : false]);
            }else {
                Dosen::find($id)->update(['is_active' => $acc == 'acc' ? true : false]);
            }

            $msg = 'Status Akun berhasil';
            $status = true;
        } catch (\Exception $e){
            $msg = $e->getMessage();
            $status = false;
        }

        return response()->json(compact('msg', 'status'));

    }

}
