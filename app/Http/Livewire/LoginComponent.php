<?php

namespace App\Http\Livewire;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{

    public $username;
    public $password;

    protected $messages = [
        'username.required' => 'username harus diisi',
        'password.required' => 'password harus diisi',
    ];

    public function render()
    {
        return view('livewire.login-component');
    }

    public function login(){

        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('dosen')->attempt(['nip' => $this->username, 'password' => $this->password])){
            return redirect(RouteServiceProvider::DOSEN);
        }
        if(Auth::guard('mahasiswa')->attempt(['nim' => $this->username, 'password' => $this->password])){
            return redirect(RouteServiceProvider::MAHASISWA);
        }



        $this->emit('loginFailed');
        return;
        

    }

}
