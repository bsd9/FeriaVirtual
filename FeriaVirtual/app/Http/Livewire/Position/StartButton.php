<?php

namespace App\Http\Livewire\Position;

use Livewire\Component;

class StartButton extends Component
{
    public $goToFeria = false;

    public function goToFeria()
    {
        $this->goToFeria = true;
    }

    public function render()
    {
        return view('livewire.position.start-button')->extends('layouts.layout')
            ->section('content');
    }
}
