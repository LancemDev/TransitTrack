<?php

namespace App\Livewire\Chart\SaccoAdmin;

use Livewire\Component;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Mary\Traits\Toast;

class Pie extends Component
{
    use Toast;
    public $data;

    public function mount()
    {
        $this->data = $this->lineChart();
    }

    public function lineChart()
    {
        $userId = Auth::user()->id;

        // Attempt to retrieve the SaccoAdmin record.
        $saccoAdmin = \App\Models\SaccoAdmin::where('user_id', $userId)->first();

        if ($saccoAdmin) {
            // If a SaccoAdmin record is found, proceed to use its sacco_id.
            $saccoId = $saccoAdmin->sacco_id;

            // Select vehicles belonging to the sacco using the sacco_id column in vehicles.
            $vehicleCounts = Vehicle::query()
                ->where('sacco_id', $saccoId)
                ->selectRaw('type, COUNT(*) as count')
                ->groupBy('type')
                ->get()
                ->pluck('count', 'type');

            // Prepare the data for the chart
            $data = [
                'labels' => $vehicleCounts->keys()->all(),
                'data' => $vehicleCounts->values()->all(),
            ];

            return $data;
        } else {
            // Handle the case where no SaccoAdmin record is found for the user.
            // You might want to return some default data structure or handle this case appropriately.
            $this->error('No SaccoAdmin record found for the user.');
            return [
                'labels' => [],
                'data' => [],
            ];
        }
    }
    public function render()
    {
        return view('livewire.chart.sacco-admin.pie', ['data' => $this->data]);
    }
}
