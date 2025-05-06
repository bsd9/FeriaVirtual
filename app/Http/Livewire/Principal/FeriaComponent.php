<?php

namespace App\Http\Livewire\Principal;

use App\Models\Feria;
use App\Models\Stand;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FeriaComponent extends Component
{
    public $feria;

    public $imageUrl;

    public $standsLocation = false;

    public $home = false;

    public $stands;

    public $showStandDetail;

    public $selectedStandId;

    public $audience = false;

    public $standHighSlelect;

    public $standMediumSelect;

    public $showModal = false;

    public $selectedStandType;

    public function showMyModal()
    {
        $this->showModal = true;
    }

    public function openModal($type)
    {
        $this->selectedStandType = $type;
        $this->emit('openModal');
    }

    public function showStandDetail($standId)
    {
        $this->showStandDetail = true;
        $this->selectedStandId = $standId;
    }

    public function toggleShowStandDetail()
    {
        $this->showStandDetail = !$this->showStandDetail;
    }

    public function mount()
    {
        $this->feria = Feria::first();
        $this->imageUrl = $this->getFirstImage();
        $this->stands = Stand::active()->select('id', 'name')->get();
        $this->standHighSlelect = Stand::where('type', 'high')->first();
        $this->standMediumSelect = Stand::where('type', 'medium')->first();
    }

    public function getFirstImage()
    {

        $lastImage = $this->feria->attachment->last();

        return $lastImage->url();

    }

    public function goToAudience()
    {
        $this->audience = true;
    }

    public function goToStand()
    {
        $this->standsLocation = true;
    }

    public function home()
    {
        $this->home = true;
    }

    public function verirify()
    {

        $user = auth('visitor')->user();

        if ($user) {
            if ($user->on_event === 0) {
                $message = '';

                $this->emit('notEvent','¡Oops! Acceso denegado');

            } elseif ($user->on_event === 1) {
                return redirect()->route('audience');
            }
        }else{
            return $this->emit('notPermitido',
                '¡Oops! Acceso denegado',
                'Para acceder a esta página, es necesario iniciar sesión. Por favor, presiona "Ir" para ir a la página principal e iniciar sesión.');
        }
    }


    public function render()
    {
        return view('livewire.principal.feria-component')
            ->extends('layouts.layout')
            ->section('content');
    }
}
