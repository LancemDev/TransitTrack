<?php

namespace App\Livewire\Sacco;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\SaccoAdmin;
use App\Models\Sacco;

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
    public $saccoAdminId;
    public $sacco_name;
    public bool $showAddVehicleModal = false;
    public bool $showAddDriverModal = false;
    public bool $showWelcomeModal = true;

    public function mount()
    {
        $this->saccoAdminId = auth()->user()->id;
        $saccoAdmin = SaccoAdmin::find($this->saccoAdminId);
        $sacco = Sacco::find($saccoAdmin->sacco_id);
        $this->sacco_name = $sacco->name;
    }

    public function render()
    {
        return view('livewire.sacco.home');
    }
}
