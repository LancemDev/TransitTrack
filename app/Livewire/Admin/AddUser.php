<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Mary\Traits\Toast;

class AddUser extends Component
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
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->phone = $this->phone;
        $user->save();
        $this->sucess('User added successfully',);
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
    }
    public function render()
    {
        return view('livewire.admin.add-user');
    }
}
