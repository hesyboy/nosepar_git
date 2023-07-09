<?php

namespace App\Http\Livewire\Panel\Challenge;

use Livewire\Component;

class MainCard extends Component
{
    public $challenge;
    public function mount($challenge){
        $this->challenge=$challenge;
    }
    public function render()
    {
        return view('livewire.panel.challenge.main-card');
    }
}
