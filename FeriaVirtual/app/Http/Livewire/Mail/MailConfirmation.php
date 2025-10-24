<?php

namespace App\Http\Livewire\Mail;

use App\Models\UserSession;
use Livewire\Component;

class MailConfirmation extends Component
{
    public $email;

    public $password;

    public $errorMessage;

    public $confirmationCode;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
        'confirmationCode' => 'required',
    ];

    public function submitForm()
    {

        $cleanConfirmationCode = str_replace('-', '', $this->confirmationCode);

        try {
            $this->validate($this->rules);

            $credentials = [
                'email' => $this->email,
                'password' => $this->password,
                'confirmation_code' => $cleanConfirmationCode,
            ];

            if (auth()->guard('visitor')->attempt($credentials)) {
                $visitorlog = auth()->guard('visitor')->user()->first();
                UserSession::create([
                    'visitor_id' => $visitorlog->id,
                    'session_id' => session()->getId(),
                ]);
                return redirect()->route('facade');
            } else {
                $this->errorMessage = 'Credenciales inválidas. Por favor, verifica tu email, contraseña y código de verificación.';
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error durante la autenticación: '.$e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.mail.mail-confirmation');
    }
}
