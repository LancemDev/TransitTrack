<?php

namespace App\Livewire\Chart\SaccoAdmin;

use Livewire\Component;
use App\Models\BoardAlert;
use App\Models\Driver;
use App\Models\SaccoAdmin;

class Line extends Component
{
    public $data;

    public function mount()
    {
        $this->data = $this->lineChart();
    }

    public function lineChart()
    {

        // Assuming the authenticated user is a sacco-admin and has a sacco_id attribute
        $saccoId = auth()->user()->sacco_id;

        // Query the database for driver counts associated with the sacco_id of the authenticated sacco-admin
        $driverCount = Driver::where('sacco_id', $saccoId)->count();

        // Prepare the data for the chart
        // Assuming you only want to display the count of drivers for the authenticated sacco-admin's sacco
        $data = [
            'labels' => ['Drivers'],
            'data' => [$driverCount],
        ];

        return $data;
    }
    public function render()
    {
        return view('livewire.chart.sacco-admin.line', [
            'data' => $this->data,
        ]);
    }
}
