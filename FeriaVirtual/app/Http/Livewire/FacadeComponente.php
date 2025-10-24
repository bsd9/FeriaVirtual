<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FacadeComponente extends Component
{
    public $go = false;

    public $left = false;

    public $right = false;

    public $front = false;

    public $back = false;

    public function front()
    {
        $this->front = true;
    }

    public function left()
    {
        $this->left = true;
    }

    public function right()
    {
        $this->right = true;
    }

    public function back()
    {
        $this->back = true;
    }

    public function stands()
    {
        $this->go = true;
    }

    public function render()
    {
        return view('livewire.facade-componente')->extends('layouts.layout')->section('content');
    }
}
