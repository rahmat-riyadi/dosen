<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AturUlangBimbingan extends Component
{

    public $note;
    public $waktu;
    public $tanggal;

    protected $listeners = [
        'reschedule' => 'handleSubmit'
    ];

    protected $messages = [
        'tanggal.required' => 'Tanggal harus diisi',
        'waktu.required' => 'Waktu harus diisi'
    ];

    public function render()
    {
        return view('livewire.atur-ulang-bimbingan');
    }

    public function handleSubmit($id){

        $this->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'note' => 'nullable',
        ]);

        try {

            DB::table('jadwal')->where('id', $id)->update([
                'status' => 'Atur Ulang Jadwal',
                'tanggal' => $this->tanggal,
                'waktu' => $this->waktu,
                'catatan' => $this->note,
                'updated_at' => Carbon::now()
            ]);

        } catch(\Exception $e){
            $msg = $e->getMessage();
        }

        $msg = 'Jadwal diatur ulang';

        $this->emit('scheduleReset', $msg);

    }
}
