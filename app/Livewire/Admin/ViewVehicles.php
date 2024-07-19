<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\Vehicle;

class ViewVehicles extends Component
{
    use Toast;

    public $vehicleId;
    public $number_plate;
    public $type;
    public $color;
    public $sacco_id;

    public bool $showEditModal = false;
    public bool $showCreateModal = false;

    public function delete($id)
    {
        Vehicle::destroy($id);
        $this->success('Vehicle deleted successfully');
    }

    public function create()
    {
        $this->number_plate = '';
        $this->type = '';
        $this->color = '';
        $this->showCreateModal = true;
    }

    public function store()
    {
        $this->validate([
            'number_plate' => 'required',
            'type' => 'required',
            'color' => 'required'
        ]);

        $vehicle = new Vehicle();
        $vehicle->number_plate = $this->number_plate;
        $vehicle->type = $this->type;
        $vehicle->color = $this->color;
        $vehicle->sacco_id = $this->sacco_id;

        if ($vehicle->save()) {
            $this->showCreateModal = false;
            $this->success('Vehicle added successfully');
        } else {
            $this->error('Failed to add vehicle');
        }
    }

    public function edit($id)
    {
        $this->vehicleId = $id;
        $vehicle = Vehicle::find($id);
        $this->number_plate = $vehicle->number_plate;
        $this->type = $vehicle->type;
        $this->color = $vehicle->color;
        $this->showEditModal = true;
    }

    public function update()
    {
        $vehicle = Vehicle::find($this->vehicleId);
        $vehicle->number_plate = $this->number_plate;
        $vehicle->type = $this->type;
        $vehicle->color = $this->color;
        $vehicle->save();
        $this->success('Vehicle updated successfully');
        $this->showEditModal = false;
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.admin.view-vehicles');
    }
}
