<?php

namespace App\Http\Livewire\Position;

use App\Models\FacadeScreenFront;
use App\Models\Feria;
use Livewire\Component;

class BackSideCompoenente extends Component
{
    public $model;

    public $left = false;

    public $right = false;

    public $front = false;

    public $goToFeria = false;

    public $publicitiBack;

    public function goToFeria()
    {
        $this->goToFeria = true;
    }

    public function left()
    {
        $this->left = true;
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
        $this->publicitiBack = FacadeScreenFront::where('position', 'back')->first();
    }

    public function render()
    {
        return view('livewire.position.back-side-compoenente')
            ->extends('layouts.app')
            ->section('content');
    }
}
