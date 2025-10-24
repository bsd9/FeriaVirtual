<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StandOneComponente extends Component
{
    public $showStands = false;

    public function goBack()
    {
        $this->showStands = true;
    }

    public function goForward()
    {

    }

    public function render()
    {
        return view('livewire.stand-one-componente');
    }
}
