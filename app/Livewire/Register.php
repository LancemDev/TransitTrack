<?php

namespace App\Livewire;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\User;

class Register extends Component
{
    use Toast;
    public $name;
    public $email;
    public $password;
    public $phone;
    
    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
        ]);
        $this->success("Account created successfully");

        // redirect to /user/home
        return redirect()->to('/users/home');
    }

    public function hello()
    {
        $this->success("Hello World");
    }
    public function render()
    {
        return view('livewire.register');
    }
}
