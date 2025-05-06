<?php

namespace App\Http\Livewire;

use App\Models\Configuration;
use App\Models\Feria;
use Livewire\Component;

class SocialNetworks extends Component
{
    public $configuration;

    public $feria;

    public function mount()
    {
        $this->configuration = Configuration::first();
        $this->feria = Feria::first();
    }

    public function render()
    {
        return view('livewire.social-networks')->extends('layouts.layout')
            ->section('content');
    }
}
