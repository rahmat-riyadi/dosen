<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadSKModal extends Component
{

    use WithFileUploads;

    public $dosens;

    public $dosen_1_id; 
    public $dosen_2_id; 
    public $file; 
    public $judul; 

    protected $messages = [
        'dosen_1_id.required' => 'dosen pembimbing 1 harus diisi',
        'dosen_2_id.required' => 'dosen pembimbing 2 harus diisi',
        'judul.required' => 'masukan judul skripsi',
        'file.required' => 'lampiran SK pembimbing',
        'file.max' => 'lampiran SK tidak boleh lebih dari 3MB',
    ];

    public function mount(){
        $this->dosens = Dosen::all();
    }

    public function render()
    {
        return view('livewire.upload-s-k-modal');
    }

    public function handleSubmit(){

        $this->validate([
            'dosen_1_id' => 'required',
            'dosen_2_id' => 'required',
            'file' => 'required|max:3024',
            'judul' => 'required'
        ]);

        $file = $this->file->store('sk');

        $mahasiswa = Mahasiswa::find(auth()->user()->id);

        try {

            if(is_null($mahasiswa->bimbingan1)){
                $mahasiswa->bimbingan1()->attach($this->dosen_1_id,[
                    'dosen_2_id' => $this->dosen_2_id,
                    'judul' => $this->judul,
                    'file' => $file,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

            } else {

                DB::table('bimbingan')->where('mahasiswa_id', auth()->user()->id)->delete();
                DB::table('jadwal')->where('mahasiswa_id', auth()->user()->id)->delete();
                $mahasiswa->bimbingan1()->attach($this->dosen_1_id,[
                    'dosen_2_id' => $this->dosen_2_id,
                    'judul' => $this->judul,
                    'file' => $file,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

            }


        } catch(\Exception $e){
            $msg = $e->getMessage();
        }

        $msg = 'pembimbing berhasil diupload';

        $this->emit('handleSubmitSK', $msg);
        return;

    }
}
