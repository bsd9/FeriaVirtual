<?php

namespace App\Http\Livewire;

use App\Models\Stand;
use Livewire\Component;

class ListStandsComponent extends Component
{
    public $stands;

    public $showStandDetail;

    public $selectedStandId;

    public function showStandDetail($standId)
    {
        $this->showStandDetail = true;
        $this->selectedStandId = $standId;

        // Restablecer $showStandDetail después de 5 segundos (opcional)
        $this->dispatchBrowserEvent('resetShowStandDetail', 5000);
    }

    public function mount()
    {
        $this->stands = Stand::select('id', 'name', 'descriptions')->get();
    }

    public function render()
    {
        return view('livewire.list-stands-component');
    }
}
