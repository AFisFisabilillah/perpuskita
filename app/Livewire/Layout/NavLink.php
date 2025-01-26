<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class NavLink extends Component
{
    public $nama, $active;
    public function render()
    {
        return view('livewire.layout.nav-link');
    }
}
