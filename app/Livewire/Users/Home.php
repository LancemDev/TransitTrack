<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Mary\Traits\Toast;

class Home extends Component
{
    use Toast;

    public $users;


    public bool $welcomeModal = true;

    public function closeModal()
    {
        $this->welcomeModal = false;
    }
    public function render()
    {
        return view('livewire.users.home');
    }
}
