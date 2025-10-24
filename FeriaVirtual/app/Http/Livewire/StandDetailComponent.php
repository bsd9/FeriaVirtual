<?php

namespace App\Http\Livewire;

use App\Models\Stand;
use Livewire\Component;

class StandDetailComponent extends Component
{
    public $standId;

    public $stand;

    public $selectedStandType;

    public function mount($id)
    {

        $this->standId = $id;
        $this->stand = Stand::find($id);
    }

    public function openModal($type)
    {
        $this->selectedStandType = $type;
        $this->emit('openModal');
    }

    private function  determinarIframe()
    {
        $stand = $this->stand;
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
            ? $stand->company->{$standTypeAttributes[$selectedStandType]}
            : null;
    }

    public function render()
    {
        return view('livewire.stand-detail-component')->extends('layouts.app')->section('content');
    }
}
