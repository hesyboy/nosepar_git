<?php

namespace App\Http\Livewire\Panel\Challenge;

use Livewire\Component;

class ShowChallenge extends Component
{
    public $challenge;

    public function mount($challenge){
        $this->challenge=$challenge;
    }
    public function render()
    {
        return view('livewire.panel.challenge.show-challenge');
    }
}
