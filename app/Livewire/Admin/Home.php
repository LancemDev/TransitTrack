<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Mary\Traits\Toast;

class Home extends Component
{
    use Toast;
    public function render()
    {
        return view('livewire.admin.home');
    }
}
