<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Sacco;
use Mary\Traits\Toast;

class AddSacco extends Component
{
    use Toast;

    public $name;
    public $registration_number;
    public $email;
    public $phone;
    public $address;
    // public $logo;
    public $password;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'registration_number' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            // 'logo' => 'required',
            'password' => 'required',
        ]);

        $sacco = new Sacco();
        $sacco->name = $this->name;
        $sacco->registration_number = $this->registration_number;
        $sacco->email = $this->email;
        $sacco->phone = $this->phone;
        $sacco->address = $this->address;
        // $sacco->logo = $this->logo;
        $sacco->password = bcrypt($this->password);
        $sacco->save();

        $this->success('Sacco added successfully');
        $this->name = '';
        $this->registration_number = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        // $this->logo = '';
        $this->password = '';
    }
    public function render()
    {
        return view('livewire.admin.add-sacco');
    }
}
