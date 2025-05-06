<?php

namespace App\Http\Livewire\Principal;

use App\Models\Configuration;
use App\Models\FacadeScreenFront;
use App\Models\Feria;
use Livewire\Component;

class FacadeFeriaComponent extends Component
{
    public $feria;

    public $model;

    public $standsLocation = false;

    public $data = [];

    public $currentIndex = 0;

    public $imageCollections = [];

    public $activeCollection;

    public $configuration;

    public $back = false;

    public $left = false;

    public $right = false;

    public $front = false;

    public $publiciti;

    public $usuario;

    public $publicitiRigth;

    public function back()
    {
        $this->back = true;
    }

    public function left()
    {
        $this->left = true;
    }

    public function right()
    {
        $this->right = true;
    }

    public function front()
    {
        $this->front = true;
    }

    public function mount()
    {

        $this->publiciti = FacadeScreenFront::where('position', 'principal')->first();

        $this->feria = Feria::first();
        $this->loadData();

        $this->activeCollection = 'images';
        $this->configuration = Configuration::first();

        $this->imageCollections = [
            'images' => [],
            'imagesTwo' => [],
            'imagesThree' => [],
            'imagesFour' => [],
        ];

        // Cargar las colecciones de imágenes
        $this->model = Feria::first();
    }

    public function loadData()
    {
        $this->data = Feria::all();
    }

    public function goToFeria()
    {
        $this->standsLocation = true;
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

    public function changeCollection($collectionName)
    {
        $this->activeCollection = $collectionName;
        $this->currentIndex = 0;
    }

    public function render()
    {
        return view('livewire.principal.facade-feria-component')
            ->extends('layouts.app')
            ->section('content');
    }
}
