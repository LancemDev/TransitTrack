<?php

namespace App\Livewire;

use Livewire\Component;
use Mary\Traits\Toast;

class Login extends Component
{
    use Toast;
    
    public function login()
    {
        $this->success('Login Successful');
    }
    public function render()
    {
        return view('livewire.login');
    }
}
