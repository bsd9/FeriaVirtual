<?php

namespace App\Http\Livewire;

use App\Models\Stand;
use Livewire\Component;

class StandsComponente extends Component
{
    public $stands;

    public $standOne = false;

    public $facade = false;

    public function mount()
    {
        $this->stands = Stand::all();
    }

    public function goToOne()
    {
        $this->standOne = true;
    }

    public function goToFacade()
    {
        $this->facade = true;
    }

    public function render()
    {
        return view('livewire.stands-componente')->extends('layouts.layout')->section('content');
    }
}
