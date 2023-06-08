<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TerimaBimbingan extends Component
{

    public $note;

    protected $listeners = [
        'handleAcc' => 'handleSubmit'
    ];

    public function render()
    {
        return view('livewire.terima-bimbingan');
    }

    public function handleSubmit($id){

        try {

            DB::table('jadwal')->where('id', $id)->update([
                'catatan' => $this->note, 
                'status' => 'Jadwal Diterima',
                'updated_at' => Carbon::now()
            ]);

        } catch (\Exception $e){
            $msg = $e->getMessage();
        }

        $msg = 'Jadwal diterima';

        $this->emit('scheduleAccepted', $msg);

    }
}
