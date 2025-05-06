<?php

namespace App\Http\Livewire\Position;

use App\Models\FacadeScreenFront;
use App\Models\Feria;
use Livewire\Component;

class RightSideCompoenente extends Component
{
    public $feria;

    public $model;

    public $left = false;

    public $back = false;

    public $front = false;

    public $goToFeria = false;

    public $publicitiRigth;

    public function goToFeria()
    {
        $this->goToFeria = true;
    }

    public function left()
    {
        $this->left = true;
    }

    public function back()
    {
        $this->back = true;
    }

    public function front()
    {
        $this->front = true;
    }

    public function mount()
    {
        $this->model = Feria::first();
        $this->publicitiRigth = FacadeScreenFront::where('position', 'right')->first();
    }

    public function render()
    {
        return view('livewire.position.right-side-compoenente')->extends('layouts.layout')
            ->section('content');
    }
}
