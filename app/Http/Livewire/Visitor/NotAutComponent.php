<?php

namespace App\Http\Livewire\Visitor;

use App\Models\UserSession;
use App\Models\Visitor;
use Livewire\Component;

class NotAutComponent extends Component
{
    public $email;
    public $password;
    public $errorMessage;
    public $encontrado;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function submitForm()
    {
        $this->validate();

        $visitor = Visitor::where('email', $this->email)->first();

        if (!$visitor) {
            $this->errorMessage = 'El usuario no fue encontrado.';
        } else {
            $userSession = UserSession::where('visitor_id', $visitor->id)->first();
            if ($userSession) {
                $this->emit('existLogin', 'Ya has iniciado sesión anteriormente.');
            } else {
                $credentials = ['email' => $this->email, 'password' => $this->password];

                if (auth()->guard('visitor')->attempt($credentials)) {
                    $visitor = auth()->guard('visitor')->user();

                    // Verificar si el visitante ya tiene una sesión registrada
                    $session = UserSession::where('visitor_id', $visitor->id)->first();

                    if (!$session) {
                        // Registrar la nueva sesión solo si no existe una sesión previa
                        $session = new UserSession();
                        $session->visitor_id = $visitor->id;
                        $session->session_id = session()->getId();
                        $session->save();
                    }

                    return redirect()->route('facade');
                }

                $this->errorMessage = 'Las credenciales ingresadas son incorrectas.';
            }
        }
    }


    public function render()
    {
        return view('livewire.visitor.not-aut-component')->extends('layouts.mailLayout')->section('content');
    }
}
