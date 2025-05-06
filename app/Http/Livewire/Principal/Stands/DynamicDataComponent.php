<?php

namespace App\Http\Livewire\Principal\Stands;

use App\Models\Feria;
use App\Models\Stand;
use Livewire\Component;

class DynamicDataComponent extends Component
{
    public $data = [];

    public $currentIndex = 0;

    public $showStandToFair = false;

    public $atras = false;

    public $feria;

    public $stand;

    public $selectedStandType;

    public function atras()
    {
        $this->atras = true;
    }

    public function renderAnotherComponent()
    {
        // Aquí puedes cambiar el nombre del componente que deseas renderizar en lugar del actual
        return $this->redirect(route('facade'));
    }

    public function mount()
    {
        $this->loadData();
        $this->feria = Feria::first();
        $this->stand = Stand::all();
    }

    public function showStandToFair()
    {
        $this->showStandToFair = true;
    }

    public function loadData()
    {
        $this->data = Stand::active()->get();
    }

    public function showNextData()
    {
        $this->currentIndex++;

        if ($this->currentIndex >= count($this->data)) {
            $this->currentIndex = 0;
        }
    }

    public function showPreviousData()
    {
        $this->currentIndex--;

        if ($this->currentIndex < 0) {
            $this->currentIndex = count($this->data) - 1;
        }
    }

    public function openModal($numero)
    {
        $this->selectedStandType = $numero;

        $this->emit('openModal');
    }

    private function determinarIframe()
    {
        $currentIndex = $this->currentIndex;
        $company = $this->data[$currentIndex]->company;

        $standTypeAttributes = [
            1 => 'ifrema',
            2 => 'ifrema',
            3 => 'ifrema_2',
            4 => 'ifrema',
            5 => 'ifrema_2',
            6 => 'ifrema_3',
        ];

        $selectedStandType = $this->selectedStandType;

        return isset($standTypeAttributes[$selectedStandType])
            ? $company->{$standTypeAttributes[$selectedStandType]}
            : null;
    }

    public function render()
    {
        return view('livewire.principal.stands.dynamic-data-component')->extends('layouts.layout')->section('content');
    }
}
