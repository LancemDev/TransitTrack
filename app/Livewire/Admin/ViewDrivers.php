<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Driver;
use Mary\Traits\Toast;

class ViewDrivers extends Component
{
    use Toast;

    public $driverId;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $sacco_id;
    public bool $showEditModal = false;
    public bool $showCreateModal = false;

    public function delete($id)
    {
        Driver::destroy($id);
        $this->success('Driver deleted successfully');
    }

    public function create()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
        $this->showCreateModal = true;
    }

    public function edit($id)
    {
        $this->driverId = $id;
        $driver = Driver::find($id);
        $this->name = $driver->name;
        $this->email = $driver->email;
        $this->phone = $driver->phone;
        $this->showEditModal = true;
    }

    public function update()
    {
        $driver = Driver::find($this->driverId);
        $driver->name = $this->name;
        $driver->email = $this->email;
        $driver->phone = $this->phone;
        $driver->save();
        $this->success('Driver updated successfully');
        $this->showEditModal = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ]);

        Driver::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
            'sacco_id' =>$this->sacco_id,
        ]);

        $this->success('Driver created successfully');
        $this->showCreateModal = false;
    }

    public function closeModal()
    {
        $this->showEditModal = false;
        $this->showCreateModal = false;
    }

    public function render()
    {
        return view('livewire.admin.view-drivers');
    }
}
