<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DetailBuku extends Component
{
    public string $id;
    public function render()
    {
        return view('livewire.admin.detail-buku')->layout('layouts.admin');
    }
}
