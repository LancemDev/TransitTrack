<?php

namespace App\Livewire\Chart;

use Livewire\Component;
use App\Models\Vehicle;

class Line extends Component
{
    public $data;

    public function mount()
    {
        $this->data = $this->lineChart();
    }

    public function lineChart()
    {
        $vehicleCounts = Vehicle::query()
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
    }
    public function render()
    {
        return view('livewire.chart.line', ['data' => $this->data]);
    }
}
