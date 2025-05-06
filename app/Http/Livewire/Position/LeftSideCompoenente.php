<?php

namespace App\Http\Livewire\Position;

use App\Models\FacadeScreenFront;
use App\Models\Feria;
use Livewire\Component;

class LeftSideCompoenente extends Component
{
    public $model;

    public $back = false;

    public $right = false;

    public $front = false;

    public $goToFeria = false;

    public $publicitiLeft;

    public function goToFeria()
    {
        $this->goToFeria = true;
    }

    public function back()
    {
        $this->back = true;
    }

    public function right()
    {
        $this->right = true;
    }

    public function front()
    {
        $this->front = true;
    }

    public function mount()
    {
        $this->model = Feria::first();
        $this->publicitiLeft = FacadeScreenFront::where('position', 'back')->first();
    }

    public function render()
    {
        return view('livewire.position.left-side-compoenente')->extends('layouts.layout')
            ->section('content');
    }
}
