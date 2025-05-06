<?php

namespace App\Http\Livewire\Stand;

use App\Models\Stand;
use Livewire\Component;

class StandsMenu extends Component
{
    public $stands;

    public function mount()
    {
        $this->stands = Stand::where('is_active', 1)->get(); // Carga los stands de la base de datos
    }

    public function render()
    {
        return view('livewire.stand.stands-menu');
    }
}
