<?php

namespace App\Http\Livewire\Principal;

use App\Models\Feria;
use Livewire\Component;

class RightsideComponent extends Component
{
    public $feria;

    public $model;

    public $left = false;

    public $back = false;

    public $front = false;

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
    }

    public function render()
    {
        return view('livewire.principal.rightside-component');
    }
}
