<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Link extends Component
{
    public $name, $link, $active;
    public function render()
    {
        return view('livewire.admin.link');
    }
}
