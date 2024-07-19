<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\Sacco;
use App\Models\SaccoAdmin;

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

    public bool $showAdminEditModal = false;
    public bool $showAdminCreateModal = false;

    public $admin_name, $admin_email, $admin_phone, $admin_password, $sacco_id, $sacco_name;

    public function delete($id)
    {
        Sacco::destroy($id);
        $this->success('Sacco deleted successfully');
    }

    public function editAdmin($id)
    {
        $this->sacco_id = $id;
        $this->admin_name = SaccoAdmin::find($id)->name;
        $this->admin_email = SaccoAdmin::find($id)->email;
        $this->admin_phone = SaccoAdmin::find($id)->phone;
        $this->sacco_name = Sacco::find($this->sacco_id)->name;
        $this->showAdminEditModal = true;
    }

    public function deleteAdmin($id)
    {
        SaccoAdmin::destroy($id);
        $this->success('Admin deleted successfully');
    }

    public function createAdmin()
    {
        $this->admin_name = '';
        $this->admin_email = '';
        $this->admin_phone = '';
        $this->admin_password = '';
        // $this->admin_address = '';
        $this->showAdminCreateModal = true;
    }

    public function storeAdmin()
    {
        $this->validate([
            'admin_name' => 'required',
            'admin_email' => 'required',
            'admin_phone' => 'required',
            'admin_password' => 'required',
            // 'admin_address' => 'required',
        ]);

        $admin = new SaccoAdmin();
        $admin->name = $this->admin_name;
        $admin->email = $this->admin_email;
        $admin->phone = $this->admin_phone;
        $admin->password = $this->admin_password;
        // $admin->address = $this->admin_address;
        $admin->sacco_id = $this->sacco_id;

        if ($admin->save()) {
            $this->showAdminCreateModal = false;
            $this->success('Admin added successfully');
        } else {
            $this->error('Failed to add admin');
        }
    }

    public function closeAdminModal()
    {
        $this->showAdminEditModal = false;
        $this->showAdminCreateModal = false;
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
        $this->showCreateModal = false;
    }

    public function render()
    {
        return view('livewire.admin.view-saccos');
    }
}
