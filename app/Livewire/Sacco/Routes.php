<?php

namespace App\Livewire\Sacco;

use Livewire\Component;
use App\Models\Route;
use Mary\Traits\Toast;

class Routes extends Component
{
    use Toast;

    public $routes;
    public $name, $start_point, $end_point;
    public $waypoints=[];

    public bool $addRouteModal = false;
    public bool $editRouteModal = false;

    public function addRoutes()
    {
        $this->name = '';
        $this->start_point = '';
        $this->end_point = '';
        $this->waypoints = '';
        $this->addRouteModal = true;
    }

    public function addRoute()
    {
        $this->validate([
            'name' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'waypoints' => 'required',
        ]);

        // convert arrays waypoints to json and store it in a string
        $this->waypoints = json_encode($this->waypoints);

        Route::create([
            'name' => $this->name,
            'start_point' => $this->start_point,
            'end_point' => $this->end_point,
            'waypoints' => $this->waypoints,
        ]);

        $this->addRouteModal = false;
        $this->toast('success', 'Route added successfully');
    }
    public function render()
    {
        return view('livewire.sacco.routes');
    }
}
