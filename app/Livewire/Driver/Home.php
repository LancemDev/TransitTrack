<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use App\Models\BoardAlert;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\DriverActivity;
use App\Models\Fare;
use App\Models\TripRevenue;
use App\Models\Route;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    use Toast, WithFileUploads;

    public $selectedOption;

    public $selectedVehicleId;

    public $vehicle;

    public $selectVehicleModal = true;

    public $showTripSummary = false;

    public $photo;
    
    public $driverId;
    
    public $driverName;

    public $saccoName;

    public $vehicleNumberPlate;

    public $location;

    public $selectedRouteId;
    public $routes;
    public $vehicles;

    public $driver_id, $route_id, $number_of_trips, $off_peak_revenue, $on_peak_revenue;

    protected $listeners = ['locationAdded' => 'add'];

    // public function mount($driverSaccoId)
    // {
    //     $this->routes = Route::all(); // Fetch all routes
    //     $this->vehicles = Vehicle::where('sacco_id', $driverSaccoId)->get(); // Fetch vehicles by sacco_id
    // }

    public function saveVehicle()
    {
        $this->selectVehicleModal = false;
        $this->fetchVehicleDetails();
        $clock_in = now();
        $activity = DriverActivity::create([
            'driver_id' => $this->driverId,
            'route_id' => $this->selectedRouteId,
            'clock_in' => $clock_in,
        ]);
        $this->success('Vehicle selected successfully');
    }

    public function saveTripsSummary()
    {
        $tripRevenue = TripRevenue::create([
            'driver_id' => auth()->id(),
            // 'route_id' => $this->route_id,
            'number_of_trips' => $this->number_of_trips,
            'off_peak_revenue' => $this->off_peak_revenue,
            'on_peak_revenue' => $this->on_peak_revenue,
        ]);

        $this->clockingOut();

        $this->showTripSummary = false;

        $this->success('Trips summary saved successfully');

        return redirect('/logout');
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
    
    public function clockOut()
    {
        $this->showTripSummary = true;
    }

    public function clockingOut()
    {
        $activity = DriverActivity::where('driver_id', $this->driverId)->latest()->first();
        $activity->clock_out = now();
        $activity->save();
        $this->success('Clocked out successfully');
    }

    public function add()
    {
        // dd($latitude, $longitude);
        $status = strtolower($this->selectedOption);

        // $location = $latitude && $longitude ? $latitude . ', ' . $longitude : null;

        $alert = BoardAlert::create([
            'driver_id' => auth()->id(),
            'vehicle_id' => $this->selectedVehicleId,
            'status' => $status,
            // 'location' => $location,
        ]); 

        $this->success('State changed successfully');
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
        } else{
            $this->vehicleNumberPlate = null;
            $this->error('Vehicle not found.');
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
