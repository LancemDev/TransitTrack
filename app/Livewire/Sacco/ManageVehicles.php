<?php

namespace App\Livewire\Sacco;

use Livewire\Component;
use App\Models\Vehicle;
use Mary\Traits\Toast;

class ManageVehicles extends Component
{
    use Toast;

    public $number_plate;
    public $type;
    public $color;
    public $vehicleId;

    public bool $showAddVehicleModal = false;
    public bool $editVehicleModal = false;

    public function addVehicle()
    {
        $this->validate([
            'number_plate' => 'required',
            'type' => 'required',
            'color' => 'required'
        ]);
        // dd('here');

        $vehicle = new Vehicle();
        $vehicle->number_plate = $this->number_plate;
        $vehicle->type = $this->type;
        $vehicle->color = $this->color;

        if ($vehicle->save()) {
            $this->showAddVehicleModal = false;
            $this->success('Vehicle added successfully');
        } else {
            $this->error('Failed to add vehicle');
        }
    }

    public function updateVehicle()
    {
        $id = $this->vehicleId;
        $vehicle = Vehicle::find($id);
        $vehicle->number_plate = $this->number_plate;
        $vehicle->type = $this->type;
        $vehicle->color = $this->color;

        if ($vehicle->save()) {
            $this->editVehicleModal = false;
            $this->success('Vehicle updated successfully');
        } else {
            $this->error('Failed to update vehicle');
        }
    }

    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $this->number_plate = $vehicle->number_plate;
        $this->type = $vehicle->type;
        $this->color = $vehicle->color;
        $this->vehicleId = $id;
        $this->editVehicleModal = true;
    }

    public function update()
    {
        $vehicle = Vehicle::find($this->vehicleId);
        $vehicle->number_plate = $this->number_plate;
        $vehicle->type = $this->type;
        $vehicle->color = $this->color;

        if ($vehicle->save()) {
            $this->editVehicleModal = false;
            $this->success('Vehicle updated successfully');
        } else {
            $this->error('Failed to update vehicle');
        }
    }

    public function closeModal()
    {
        $this->showAddVehicleModal = false;
        $this->editVehicleModal = false;
    }

    public function delete($id)
    {
        Vehicle::destroy($id);
        $this->success('Vehicle deleted successfully');
    }

    public function render()
    {
        return view('livewire.sacco.manage-vehicles');
    }
}
