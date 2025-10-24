<?php

namespace App\Http\Livewire;

use App\Mail\ConfirmationMail;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class VisitorsRegisterModal extends Component
{
    public $first_name;

    public $second_name;

    public $first_last_name;

    public $second_last_name;

    public $email;

    public $phone;

    public $gender;

    public $nationality;

    public $password;

    public $accept_terms;

    public $join_specialists_program;

    public $g_recaptcha_response;

    protected $rules = [
        'first_name' => 'required|min:3',
        'first_last_name' => 'required|min:5',
        'second_last_name' => 'required|min:5',
        'email' => 'required|email|unique:visitors',
        'phone' => 'required|min:10',
        'gender' => ['required', 'not_in:seleccionar'],
        'nationality' => 'required',
        'password' => 'required|min:8',
        'accept_terms' => 'required',
        'join_specialists_program' => 'required',
    ];

    protected $messages = [
        'first_name.required' => 'Primer nombre es obligatorio.',
        'first_name.min' => 'Se require un minimo de 3 caracteres.',

        'first_last_name.required' => 'Primer apellido es obligatorio.',
        'first_last_name.min' => 'Se require un minimo de 5 caracteres.',

        'second_last_name.required' => 'Segundo apellido es obligatorio.',
        'second_last_name.min' => 'Se require un minimo de 5 caracteres.',

        'email.required' => 'El campo Email es obligatorio.',
        'email.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
        'email.unique' => 'Este correo electrónico ya está registrado, por favor utiliza otro.',

        'phone.required' => 'El campo Teléfono es obligatorio.',
        'phone.string' => 'El campo Teléfono debe ser una cadena de texto.',

        'gender.required' => 'El campo sexo es obligatorio.',
        'gender.not_in' => 'Debe seleccionar un sexo.',

        'nationality.required' => 'El campo Nacionalidad es obligatorio.',
        'nationality.string' => 'El campo Nacionalidad debe ser una cadena de texto.',

        'password.required' => 'Contraseña obligatoria',
        'password.min' => 'contraseña debe contener minimo 8 caracteres',

        'accept_terms.required' => 'Debes aceptar los términos y condiciones.',
        'accept_terms.accepted' => 'Debes aceptar los términos y condiciones.',
        'join_specialists_program.accepted' => 'Si quieres ser parte del programa, debes aceptar los términos y condiciones.',

    ];

    protected $validationAttributes = [
        'first_name' => 'Primer nombre',
        'first_last_name' => 'Segundo nombre',
        'email' => 'Correo electrónico',
        'phone' => 'Número de telefono',
        'gender' => 'Sexo',
        'nationality' => 'Nacionalidad',
        'password' => 'Contraseña',
        'accept_terms' => 'Términos y condiciones',
        'join_specialists_program' => 'Políticas',

    ];

    public function submit(Request $request)
    {
        $this->validateData();

        $confirmationCode = Str::random(40);
        $confirmationCodeExpiresAt = now()->addDay();

        $visitor = $this->createVisitor($request, $confirmationCode, $confirmationCodeExpiresAt);

        $this->reset();
        $this->sendConfirmationEmail($visitor);
        $this->emit('showAlert', 'Se envió un email al correo electrónico para la verificación: ', $visitor->email);
    }

    private function validateData()
    {
        $this->validate();
    }

    private function createVisitor(Request $request, $confirmationCode, $confirmationCodeExpiresAt)
    {

        //        ddd($request);
        $userIP = FacadesRequest::ip();

        return Visitor::create([
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'first_last_name' => $this->first_last_name,
            'second_last_name' => $this->second_last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'ip_address' => $userIP,
            'nationality' => $this->nationality,
            'user_agent' => $request->header('User-Agent'),
            'device' => $this->getDeviceType($request->header('User-Agent')),
            'accept_terms' => $this->accept_terms,
            'join_specialists_program' => $this->join_specialists_program,
            'password' => bcrypt($this->password),
            'confirmation_code' => $confirmationCode,
            'confirmation_code_expires_at' => $confirmationCodeExpiresAt,
        ]);
    }

    private function sendConfirmationEmail($visitor)
    {
        try {
            Mail::to($visitor->email)->send(new ConfirmationMail($visitor->confirmation_code));
        } catch (\Exception $e) {
            // Manejar el error de envío de correo electrónico (puedes loggearlo, enviar notificaciones, etc.)
            // Puedes también lanzar una excepción personalizada si es necesario.
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

    public function render()
    {
        return view('livewire.visitors-register-modal');
    }
}
