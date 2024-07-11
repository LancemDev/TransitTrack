<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\Sacco;

class ViewSaccos extends Component
{
    use Toast;

    public $saccoId;
    public $name;
    public $registration_number;
    public $email;
    public $phone;
    public $address;
    public $logo;
    public $description;
    public $password;
    public bool $showEditModal = false;
    public bool $showCreateModal = false;

    public function delete($id)
    {
        Sacco::destroy($id);
        $this->success('Sacco deleted successfully');
    }

    public function create()
    {
        $this->name = '';
        $this->registration_number = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->logo = '';
        $this->description = '';
        $this->password = '';
        $this->showCreateModal = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'registration_number' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);

        $sacco = new Sacco();
        $sacco->name = $this->name;
        $sacco->registration_number = $this->registration_number;
        $sacco->email = $this->email;
        $sacco->phone = $this->phone;
        $sacco->address = $this->address;
        $sacco->logo = $this->logo;
        $sacco->description = $this->description;
        $sacco->password = $this->password;
        $sacco->address = $this->address;

        if ($sacco->save()) {
            $this->showCreateModal = false;
            $this->success('Sacco added successfully');
        } else {
            $this->error('Failed to add sacco');
        }
    }

    public function edit($id)
    {
        $this->saccoId = $id;
        $sacco = Sacco::find($id);
        $this->name = $sacco->name;
        $this->registration_number = $sacco->registration_number;
        $this->email = $sacco->email;
        $this->phone = $sacco->phone;
        $this->address = $sacco->address;
        $this->logo = $sacco->logo;
        $this->showEditModal = true;
    }

    public function update()
    {
        $sacco = Sacco::find($this->saccoId);
        $sacco->name = $this->name;
        $sacco->registration_number = $this->registration_number;
        $sacco->email = $this->email;
        $sacco->phone = $this->phone;
        $sacco->address = $this->address;
        $sacco->logo = $this->logo;
        $sacco->save();
        $this->success('Sacco updated successfully');
        $this->showEditModal = false;
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.admin.view-saccos');
    }
}
