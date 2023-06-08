<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Carbon\Carbon;
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
        return view('livewire.ajukan-bimbingan');
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
            $file = $this->file->store('draf');
        }

        try {

            $m = Mahasiswa::find(auth()->user()->id);

            $m->jadwal()->attach($this->dosen_id,[
                'waktu' => $this->waktu,
                'tanggal' => $this->tanggal,
                'file' => empty($file) ? null : $file,
                'pertemuan' => $this->pertemuan,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        } catch(\Exception $e){
            $msg = $e->getMessage();
        }

        $msg = 'Jadwal Berhasil Diajukan';

        $this->emit('handleSubmitBimbingan', $msg);


    }

}
