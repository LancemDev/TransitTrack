<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use App\Models\BoardAlert;
use App\Models\Driver;
use App\Models\Vehicle;

class Home extends Component
{
    use Toast, WithFileUploads;

    public $selectedOption;

    public $selectedVehicleId;

    public $vehicle;

    public $selectVehicleModal = true;

    public $photo;
    
    public $driverId;
    
    public $driverName;

    public $saccoName;

    public $vehicleNumberPlate;

    public $location;

    protected $listeners = ['locationAdded' => 'add'];

    public function saveVehicle()
    {
        $this->selectVehicleModal = false;
        $this->fetchVehicleDetails();
        $this->success('Vehicle selected successfully');
    }

    
    public function uploadPhoto()
    {
        if ($this->photo && $this->driverId) {
            $path = $this->photo->store('avatars', 'public');
            
            // Fetch the driver by the stored driverId
            $driver = Driver::find($this->driverId);
            if ($driver) {
                $driver->avatar_path = $path;
                $driver->save();
    
                $this->success('Profile Photo Updated Successfully.');
            } else {
                $this->error('Driver not found.');
            }
        }
    }

    

    public function add($latitude, $longitude)
    {
        $status = strtolower($this->selectedOption);

        $location = $latitude && $longitude ? $latitude . ', ' . $longitude : null;

        $alert = BoardAlert::create([
            'driver_id' => auth()->id(),
            'vehicle_id' => $this->selectedVehicleId,
            'status' => $status,
            'location' => $location,
        ]); 

        $this->success('State changed to '.($this->selectedOption == 'full' ? 'full' : 'empty').' successfully');
    }
    
    public function fetchVehicleDetails()
    {
        if ($this->selectedVehicleId) {
            $this->vehicle = Vehicle::find($this->selectedVehicleId);
            if ($this->vehicle) {
                $this->vehicleNumberPlate = $this->vehicle->number_plate;
            } else {
                $this->vehicleNumberPlate = null;
                $this->error('Vehicle not found.');
            }
        }
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'selectedVehicleId') {
            $this->fetchVehicleDetails();
        }
    }

    public function render()
    {
        $this->driverId = auth()->id();
        $this->driverName = auth()->user()->name;
        
        // Assuming there's a 'sacco' relationship defined in the Driver model
        $this->saccoName = auth()->user()->sacco->name; // Fetch the sacco name from the sacco_id of the driver

        $this->driverAvatarPath = Driver::find($this->driverId)->avatar_path;

        // Always fetch vehicle details if a vehicle is selected
        if ($this->selectedVehicleId) {
            $this->fetchVehicleDetails();
        }

        return view('livewire.driver.home', [
            'saccoName' => $this->saccoName, // Pass the sacco name to the view
        ]);
    }
}
