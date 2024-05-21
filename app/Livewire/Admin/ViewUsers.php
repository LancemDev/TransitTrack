<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Mary\Traits\Toast;

class ViewUsers extends Component
{
    use Toast;
        
    public $userId;
    public $name;
    public $email;
    public $role;
    public $phone;
    public bool $showEditModal = false;

    public function delete($id)
    {
        User::destroy($id);
        $this->success('Employee deleted successfully');
    }

    public function edit($id)
    {
        $this->userId = $id;
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->phone = $user->phone;
        $this->showEditModal = true;
    }

    public function update()
    {
        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->save();
        $this->success('User updated successfully');
        $this->showEditModal = false;
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }
    
    public function render()
    {
        return view('livewire.admin.view-users');
    }
}
