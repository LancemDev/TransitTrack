<?php

namespace App\Livewire\Sacco;

use Livewire\Component;
use Mary\Traits\Toast;

class Home extends Component
{
    use Toast;
    public function render()
    {
        return view('livewire.sacco.home');
    }
}
