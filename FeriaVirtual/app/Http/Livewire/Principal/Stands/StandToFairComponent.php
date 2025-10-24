<?php

namespace App\Http\Livewire\Principal\Stands;

use App\Models\Stand;
use Livewire\Component;

class StandToFairComponent extends Component
{
    public $imageUrl;

    public $stands;

    public function mount()
    {
        $this->imageUrl = Stand::get();
        $this->imageUrl = $this->getImage();
    }

    public function getImage()
    {
        if ($this->stands) {
            $image = $this->feria->getFirstMediaUrl('images');

            return $image ?: '';
        }

        return '';
    }

    public function render()
    {
        return view('livewire.principal.stands.stand-to-fair-component');
    }
}
