<?php

namespace App\Livewire\Sacco;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\Vehicle;
use App\Models\Driver;

class Home extends Component
{
    use Toast;

    public $name;
    public $email;
    public $phone;
    public $password;
    public $number_plate;
    public $type;
    public $color;

    public bool $showAddVehicleModal = false;

    public bool $showAddDriverModal = false;

    public bool $showWelcomeModal = true;


    public function render()
    {
        return view('livewire.sacco.home');
    }
}
