<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\BoardAlert;

class Home extends Component
{
    use Toast;

    public $selectedOption;

    public $selectedVehicleId;

    public $selectVehicleModal = true;
    

    public function saveVehicle()
    {
        $this->selectVehicleModal = false;
        $this->success('Vehicle selected successfully');
    }

    public function add()
    {
        $alert = BoardAlert::create([
            'driver_id' => auth()->id(),
            'vehicle_id' => $this->selectedVehicleId,
            'status' => $this->selectedOption,
        ]); 

        $this->success('State changed to '.($this->selectedOption == 'full' ? 'full' : 'empty').' successfully');
    }
    
    public function render()
    {
        return view('livewire.driver.home');
    }
}
