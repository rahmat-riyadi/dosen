<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AjukanBimbingan extends Component
{

    use WithFileUploads;

    public $dosens;
    public $dosen_id;
    public $tanggal;
    public $waktu;
    public $file;
    public $pertemuan;

    protected $messages = [
        'tanggal.required' => 'tanggal harus diisi',
        'waktu.required' => 'waktu harus diisi',
        'dosen_id.required' => 'dosen pembimbing harus diisi',
        'pertemuan.required' => 'pertemuan harus diisi',
    ];

    public function mount(){
        $this->dosens = Dosen::all();
    }

    public function render()
    {

        $pendingDosen = DB::table('jadwal')
        ->where('mahasiswa_id', auth()->user()->id)
        ->where('status', 'Menunggu')
        ->pluck('dosen_id')->toArray();

        return view('livewire.ajukan-bimbingan',[
            'dosens' => Dosen::all(),
            'pendingDosen' => $pendingDosen
        ]);
    }

    public function handleSubmit(){

        $this->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'dosen_id' => 'required',
            'file' => 'nullable',
            'pertemuan' => 'nullable'
        ]);

        if(!empty($this->file)){
            $file = $this->file->store('file');
        }

        $isContainJadwal = DB::table('jadwal')
        ->where('mahasiswa_id', auth()->user()->id)
        ->where('tanggal', $this->tanggal)
        ->count();

        if($isContainJadwal != 0){
            $this->emit('handleSubmitBimbingan', [
                'status' => false,
                'message' => 'Jadwal sudah terisi untuk tanggal ini'
            ]);
            return;
        }

        try {

            $m = Mahasiswa::find(auth()->user()->id);

            $latestBimbingan = DB::table('jadwal')
            ->where('mahasiswa_id', auth()->user()->id)
            ->where('dosen_id', $this->dosen_id)
            ->latest()
            ->first('pertemuan');

            $m->jadwal()->attach($this->dosen_id,[
                'waktu' => $this->waktu,
                'tanggal' => $this->tanggal,
                'file' => empty($file) ? null : $file,
                'pertemuan' => !is_null($latestBimbingan) ? $latestBimbingan->pertemuan+1 : 1 ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $status = true;
            $msg = 'Jadwal Berhasil Diajukan';
        } catch(\Exception $e){
            $status = false;
            $msg = $e->getMessage();
        }


        $this->emit('handleSubmitBimbingan', [
            'status' => $status,
            'message' => $msg
        ]);


    }

}
