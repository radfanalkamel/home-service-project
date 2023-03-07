<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
class Alwrifi extends Component
{
    public function render()
    {
        return view('livewire.alwrifi')->layout('layouts.service');
    }
}
