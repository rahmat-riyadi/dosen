<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UpdateCatatan extends Component
{

    protected $listeners = [
        'submitCatatan' => 'handleSubmit'
    ];

    protected $messages = [
        'note.required' => 'catatan harus diisi'
    ];

    public $note;

    public function render()
    {
        return view('livewire.update-catatan');
    }

    public function handleSubmit($id){
        $this->validate([
            'note' => 'required'
        ]);

        try {
            DB::table('jadwal')->where('id', $id)->update(['catatan' => $this->note]);
        } catch (\Exception $e){
            $msg = $e->getMessage();
        }
        
        $msg = 'catatan di perbaharui';
        $this->emit('catatanSubmitted', $msg);

    }


}
