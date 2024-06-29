<?php

namespace App\Livewire\Chart\Admin;

use Livewire\Component;
use App\Models\Driver;
use App\Models\User as Passenger;
use App\Models\SaccoAdmin;
use App\Models\Admin;


class Bar extends Component
{
    public $data;

    public function mount()
    {
        $this->data = $this->barChart();
    }

    public function barChart()
    {
        // Query the database for user counts
        $driverCount = Driver::count();
        $passengerCount = Passenger::count();
        $saccoAdminCount = SaccoAdmin::count();
        $adminCount = Admin::count();

        // Prepare the data for the chart
        $data = [
            'labels' => ['Drivers', 'Passengers', 'Sacco Admins', 'Admins'],
            'data' => [$driverCount, $passengerCount, $saccoAdminCount, $adminCount],
        ];

        return $data;
    }

    public function render()
    {
        return view('livewire.chart.admin.bar', ['data' => $this->data]);
    }
}