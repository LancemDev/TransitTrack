<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Driver;
use Mary\Traits\Toast;

class AddDrivers extends Component
{
    use Toast;

    public $name;
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $driver = new Driver();
        $driver->name = $this->name;
        $driver->email = $this->email;
        $driver->password = bcrypt($this->password);
        $driver->save();

        $this->success('Driver added successfully',);
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function render()
    {
        return view('livewire.admin.add-drivers');
    }
}
