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
    public bool $showEditModal = false;

    public function delete($id)
    {
        Sacco::destroy($id);
        $this->success('Sacco deleted successfully');
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
