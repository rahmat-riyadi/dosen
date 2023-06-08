<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassModal extends Component
{

    public $newPass;
    public $oldPass;
    public $confirmPass;

    protected $messages = [
        'newPass.required' => 'password baru harus diisi',
        'oldPass.required' => 'password lama harus diisi',
        'confirmPass.required' => 'konfirmasi password harus diisi'
    ];

    public function render()
    {
        return view('livewire.change-pass-modal');
    }

    public function handleSubmit(){

        $this->validate([
            'newPass' => 'required',
            'oldPass' => 'required',
            'confirmPass' => 'required',
        ]);

        if(!Hash::check($this->oldPass,auth()->user()->password)){
            $msg = 'Password Salah';
            $this->emit('handleResetPass', ['message' => $msg, 'success' => false]);
            return;
        }

        if($this->newPass != $this->confirmPass){
            $msg = 'Konfirmasi Password Salah';
            $this->emit('handleResetPass', ['message' => $msg, 'success' => false]);
            return;
        }

        if(is_null(auth()->user()->nip)){
            Mahasiswa::find(auth()->user()->id)->update([ 'password' => bcrypt($this->newPass) ]);
        } else {
            Dosen::find(auth()->user()->id)->update([ 'password' => bcrypt($this->newPass) ]);
        }

        $msg = 'Password berhasil diubah';
        $this->emit('handleResetPass', ['message' => $msg, 'success' => true]);


    }


}
