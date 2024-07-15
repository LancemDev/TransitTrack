<?php

namespace App\Livewire\Users;


use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Route;
use App\Models\Sacco;

class Home extends Component
{
    use Toast;

    public bool $showModal = false;
    public $search;

    public $busDetails = [];

    protected $listeners = ['openModal'];

    public function openModal()
    {
        // $this->busDetails = $busDetails;
        $this->showModal = true;
    }
    public function render()
    {
        return view('livewire.users.home');
    }
}
