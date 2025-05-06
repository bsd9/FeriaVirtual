<?php

namespace App\Http\Livewire;

use App\Models\UserSession;
use Livewire\Component;

class VisitorsModal extends Component
{
    public $email;

    public $password;

    public $errorMessage;

    protected $listeners = ['confirmExistLogin'];

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];


    public function submitForm()
    {
        $visitor = \App\Models\Visitor::where('email', $this->email)->first();

        if ($visitor) {
            $userSession = UserSession::where('visitor_id', $visitor->id)->first();
            if ($userSession) {
                $this->emit('existLogin', 'Ya has iniciado sesión anteriormente. Se cerrará la sesión en otros dispositivos.', $userSession->id);
                return ;
            }
        }
        try {
            $credentials = ['email' => $this->email, 'password' => $this->password];

            if (auth()->guard('visitor')->attempt($credentials)) {
                $visitor = auth()->guard('visitor')->user();

                $session = UserSession::where('visitor_id', $visitor->id)->first();

                if (!$session) {

                    $session = new UserSession();
                    $session->visitor_id = $visitor->id;
                    $session->session_id = session()->getId();
                    $session->save();
                }
                return redirect()->route('facade');
            } else {
                $this->errorMessage = 'Credenciales inválidas. Por favor, verifica tu email y contraseña.';
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error durante la autenticación: '.$e->getMessage();
        }
    }

    public function confirmExistLogin($userSession)
    {
        UserSession::findOrfail($userSession)->delete();
        $this->submitForm();
    }
    public function render()
    {
        return view('livewire.visitors-modal');
    }
}
