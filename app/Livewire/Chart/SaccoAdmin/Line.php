<?php

namespace App\Livewire\Chart\SaccoAdmin;

use Livewire\Component;
use App\Models\BoardAlert;
use App\Models\Driver;
use App\Models\SaccoAdmin;
use App\Models\DriverActivity;

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

        // Assuming $saccoId is already defined with the sacco_id of the logged-in user.
        
        // "Currently in a trip" count remains the same
        $driverActiveCount = DriverActivity::where('sacco_id', $saccoId)
            ->whereNull('clock_out')
            ->whereNotNull('clock_in')
            ->distinct('driver_id')
            ->count('driver_id');
        
        // Correcting "Clocked out" count
        // First, get the latest clock_in for each driver
        $latestClockIns = DriverActivity::select('driver_id', \DB::raw('MAX(clock_in) as last_clock_in'))
            ->where('sacco_id', $saccoId)
            ->groupBy('driver_id');
        
        // Then, count how many of these have a clock_out
        $driverClockedOutCount = DriverActivity::joinSub($latestClockIns, 'latest_activities', function ($join) {
                $join->on('driver_activities.driver_id', '=', 'latest_activities.driver_id')
                     ->whereRaw('driver_activities.clock_in = latest_activities.last_clock_in');
            })
            ->whereNotNull('clock_out')
            ->count();
        
        // Total driver count
        $driverCount = Driver::where('sacco_id', $saccoId)->count();
        
        // "Yet to start working" count - Derived by subtracting the other two counts from the total
        $driverYetToStartCount = $driverCount - $driverActiveCount - $driverClockedOutCount;
        // Prepare the data for the chart
        // Assuming you only want to display the count of drivers for the authenticated sacco-admin's sacco
        $data = [
            'labels' => ['Active Drivers', 'Inactive Drivers', 'Drivers Yet To start'],
            'data' => [$driverActiveCount, $driverClockedOutCount, $driverYetToStartCount]
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
