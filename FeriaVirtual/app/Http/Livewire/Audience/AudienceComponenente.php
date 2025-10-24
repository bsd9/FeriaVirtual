<?php

namespace App\Http\Livewire\Audience;

use App\Models\Audience;
use Livewire\Component;

class AudienceComponenente extends Component
{
    public $home = false;

    public $audience;

    public $imgIzquierda;
    public $imgDerecha;
    public $video_evento;
    public $nombre;
    public function mount()
    {
        $audience = Audience::first();
        $this->imgIzquierda = $audience->attachment()->first()->url;
        $this->imgDerecha = $audience->attachment()->latest()->first()->url;
        $this->video_evento = $audience->video_url;
        $this->nombre = $audience->name;


    }

    public function home()
    {
        $this->home = true;
    }

    public function render()
    {
        return view('livewire.audience.audience-componenente')
            ->extends('layouts.app')
            ->section('content');
    }
}
