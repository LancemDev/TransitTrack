<?php

namespace App\Livewire\Sacco;

use Livewire\Component;
use App\Models\Driver;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;

class ManageDrivers extends Component
{
    use Toast, WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $password;
    public $driverId;
    public $avatar;
    public $sacco_name;


    public bool $showAddDriverModal = false;
    public bool $editDriverModal = false;

    public function addDriverModal()
    {
        $this->name='';
        $this->email='';
        $this->phone='';
        $this->password='';
        $this->showAddDriverModal = true;
    }

    public function addDriver()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $driver = new Driver();
        $driver->name = $this->name;
        $driver->email = $this->email;
        $driver->phone = $this->phone;
        $driver->password = bcrypt($this->password);
        $driver->sacco_id = auth()->user()->sacco_id;
        if($this->avatar){
            $driver->avatar_path = $this->avatar->store('avatars', 'public');
        }

        if ($driver->save()) {
            $this->showAddDriverModal = false;
            $this->success('Driver added successfully');
        } else {
            $this->error('Failed to add driver');
        }
    }

    public function updateDriver()
    {
        $id = $this->driverId;
        $driver = Driver::find($id);
        $driver->name = $this->name;
        $driver->email = $this->email;
        $driver->phone = $this->phone;
        if($this->avatar){
            $driver->avatar_path = $this->avatar->store('avatars', 'public');
        }

        if ($driver->save()) {
            $this->editDriverModal = false;
            $this->success('Driver updated successfully');
        } else {
            $this->error('Failed to update driver');
        }
    }

    public function edit($id)
    {
        $driver = Driver::find($id);
        $this->driverId = $id;
        $this->name = $driver->name;
        $this->email = $driver->email;
        $this->phone = $driver->phone;
        $this->avatar = $driver->avatar_path;
        $this->sacco_name = $driver->sacco->name;
        $this->editDriverModal = true;
    }

    public function update()
    {
        $driver = Driver::find($this->driverId);
        $driver->name = $this->name;
        $driver->email = $this->email;
        $driver->phone = $this->phone;

        if ($driver->save()) {
            $this->editDriverModal = false;
            $this->success('Driver updated successfully');
        } else {
            $this->error('Failed to update driver');
        }
    }

    public function closeModal()
    {
        $this->showAddDriverModal = false;
        $this->editDriverModal = false;
    }

    public function showAddDriverModal()
    {
        // Reset the properties
        $this->reset(['name', 'email', 'phone', 'password', 'password_confirmation']);

        // Show the modal
        $this->showAddDriverModal = true;
    }

    public function delete($id)
    {
        Driver::destroy($id);
        $this->success('Driver deleted successfully');
    }


    public function render()
    {
        $drivers = Driver::where('sacco_id', auth()->user()->sacco_id)->get();
        $this->avatar = auth()->user()->avatar_path;
        return view('livewire.sacco.manage-drivers');
    }
}
