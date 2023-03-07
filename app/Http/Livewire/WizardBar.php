<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WizardBar extends Component
{
    protected $listeners = ['UpdateBar' => 'render'] ;
    public function render()
    {
        return view('livewire.wizard-bar');
    }
}
