<?php

namespace App\Http\Livewire;

use App\Models\Popups;
use Livewire\Component;

class PopupsComponent extends Component
{
    public $popups;

    public $image;

    public function mount()
    {
        $this->popups = Popups::first();

    }

    public function render()
    {
        return view('livewire.popups-component');
    }
}
