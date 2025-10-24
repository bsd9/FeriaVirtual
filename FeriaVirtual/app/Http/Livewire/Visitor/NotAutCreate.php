<?php

namespace App\Http\Livewire\Visitor;

use App\Mail\ConfirmationMail;
use App\Models\UserSession;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class NotAutCreate extends Component
{
    public $first_name;
    public $second_name;
    public $first_last_name;
    public $second_last_name;
    public $email;
    public $phone;
    public $gender;
    public $password;
    public $accept_terms;
    public $join_specialists_program;
    public $geolocation;
    public $nationality;
    public $ipAddress;



    protected $rules = [
        'first_name' => 'required',
        'second_name' => 'required',
        'first_last_name' => 'required',
        'second_last_name' => 'required',
        'email' => 'required|email|unique:visitors',
        'gender' => ['required', 'not_in:seleccionar'],
        'accept_terms' => 'required',
        'join_specialists_program' => 'required',
        'nationality' => 'required',
    ];
    protected $messages = [
        'first_name.required' => 'El nombre es obligatorio.',
        'second_name.required' => 'El segundo nombre es obligatorio.',
        'first_last_name.required' => 'El primer apellido es obligatorio.',
        'second_last_name.required' => 'El segundo apellido es obligatorio.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El formato del correo electrónico no es válido.',
        'email.unique' => 'Este correo electrónico ya está en uso.',
        'gender.required' => 'El campo sexo es obligatorio.',
        'gender.not_in' => 'Debe seleccionar un sexo.',
        'accept_terms.required' => 'Debes aceptar los términos.',
        'join_specialists_program.required' => 'Debes indicar si deseas unirte al programa de especialistas.',
        'nationality.required' => 'Debes indicar si deseas unirte al programa de especialistas.',
    ];


    public function submitForm(Request $request)
    {
        $this->validate();
        $confirmationCode = \Illuminate\Support\Str::random(40);
        $confirmationCodeExpiresAt = now()->addDay();

        $this->ipAddress = $request->ip();
//        ddd($request->header('user-agent'));
       $visitor = Visitor::create([
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'first_last_name' => $this->first_last_name,
            'second_last_name' => $this->second_last_name,
            'email' => $this->email,
            'accept_terms' => $this->accept_terms,
            'join_specialists_program' => $this->join_specialists_program,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'nationality' => $this->nationality,
            'ip_address'  => $this->ipAddress,
            'user_agent' => $request->header('user-agent'),
            'device' => $this->getDeviceType($request->header('user-agent')),
            'password' => bcrypt($this->password),
            'confirmation_code' => $confirmationCode,
            'confirmation_code_expires_at' => $confirmationCodeExpiresAt,
        ]);

        $this->reset();
        $this->sendConfirmationEmail($visitor);
        $this->emit('showAlert', 'Se envió un email al correo electrónico para la verificación: ');




    }
    private function sendConfirmationEmail($visitor)
    {
        try {
            Mail::to($visitor->email)->send(new ConfirmationMail($visitor->confirmation_code));
        } catch (\Exception $e) {

        }
    }

    private function getDeviceType($userAgent)
    {
        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        if ($agent->isDesktop()) {
            return 'Escritorio';
        } elseif ($agent->isMobile()) {
            return 'Móvil';
        } elseif ($agent->isTablet()) {
            return 'Tableta';
        } else {
            return 'Desconocido';
        }
    }


    function render()
    {
        return view('livewire.visitor.not-aut-create')->extends('layouts.mailLayout')->section('content');
    }
}
