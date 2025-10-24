<?php

namespace App\Http\Controllers;

use App\Models\UserSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('visitors.login_visitor')->with('message', 'Mensaje deseado aquí');
    }

    public function login(Request $request)
    {
        $visitor = \App\Models\Visitor::where('email', $request->email)->first();

        if ($visitor) {
            $userSession = UserSession::where('visitor_id', $visitor->id)->first();

            if ($userSession) {
                return view('visitors.login_visitor')->with('error', 'Ya has iniciado sesión anteriormente.');

            }
        }

        $credentials = $request->only('email', 'password');
        if (Auth::guard('visitor')->attempt($credentials)) {
            $visitor = Auth::guard('visitor')->user();

            // Verificar si el visitante ya tiene una sesión registrada
            $session = UserSession::where('visitor_id', $visitor->id)->first();

            if (!$session) {
                // Registrar la nueva sesión solo si no existe una sesión previa
                $session = new UserSession();
                $session->visitor_id = $visitor->id;
                $session->session_id = session()->getId();
                $session->save();
            }

            return redirect()->route('audience');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout()

    {
        $userSistema = UserSession::where('visitor_id', auth()->guard('visitor')->id())->delete();

        Auth::guard('visitor')->logout();
        return redirect()->route('principal');
    }
}
