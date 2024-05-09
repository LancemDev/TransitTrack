<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use Mary\Traits\Toast;

class Home extends Component
{
    use Toast;
    public function render()
    {
        return view('livewire.driver.home');
    }
}
