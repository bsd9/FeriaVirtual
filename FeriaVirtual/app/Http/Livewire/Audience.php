<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Audience extends Component
{
    public $audience;

    public function mount()
    {
        $this->audience = Audience::first();
    }

    public function render()
    {
        return view('livewire.audience');
    }
}
