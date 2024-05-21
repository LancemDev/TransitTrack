<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Vehicle;
use Mary\Traits\Toast;

class AddVehicle extends Component
{
    use Toast;

    public $number_plate;
    public $type;
    public $color;

    public function save()
    {
        $this->validate([
            'number_plate' => 'required',
            'type' => 'required',
            'color' => 'required',
        ]);

        $vehicle = new Vehicle();
        $vehicle->number_plate = $this->number_plate;
        $vehicle->type = $this->type;
        $vehicle->color = $this->color;
        $vehicle->save();

        $this->success('Vehicle added successfully',);
        $this->number_plate = '';
        $this->type = '';
        $this->color = '';
    }

    public function render()
    {
        return view('livewire.admin.add-vehicle');
    }
}
