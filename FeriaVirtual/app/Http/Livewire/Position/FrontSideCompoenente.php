<?php

namespace App\Http\Livewire\Position;

use App\Models\Feria;
use Livewire\Component;

class FrontSideCompoenente extends Component
{
    public $model;

    public $left = false;

    public $right = false;

    public $back = false;

    public function back()
    {
        $this->back = true;
    }

    public function left()
    {
        $this->left = true;
    }

    public function right()
    {
        $this->right = true;
    }

    public function mount()
    {
        $this->model = Feria::first();
    }

    public function render()
    {
        return view('livewire.position.front-side-compoenente')->extends('layouts.layout')
            ->section('content');
    }
}
