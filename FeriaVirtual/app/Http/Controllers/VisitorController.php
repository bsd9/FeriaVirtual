<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class VisitorController extends Controller
{
    public function index(): View
    {
        $userId = Auth::guard('visitor')->id();
        $detailUser = Visitor::findOrFail($userId);

        return view('visitors.visitorProfile', compact('detailUser'));
    }

    public function create(Request $request)
    {
        //        ddd($request);
        $confirmationCode = \Illuminate\Support\Str::random(40);
        $confirmationCodeExpiresAt = now()->addDay();
        Visitor::create([
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'first_last_name' => $request->input('first_last_name'),
            'second_last_name' => $request->input('second_last_name'),
            'email' => $request->input('email'),
            'nationality' => $request->input('nationality'),
            'phone' => $request->input('phone'),
            'accept_terms' => $request->has('accept_terms'),
            'join_specialists_program' => $request->has('join_specialists_program'),
        ]);

        return back()->with('success', 'Información personal actualizada');

    }

    private function sendConfirmationEmail($visitor)
    {

        try {
            Mail::to($visitor->email)->send(new ConfirmationMail($visitor->confirmation_code));
        } catch (\Exception) {

        }
    }

    public function submit(Request $request)
    {
        $confirmationCode = \Illuminate\Support\Str::random(40);
        $confirmationCodeExpiresAt = now()->addDay();

        $visitor = $this->store($request, $confirmationCode, $confirmationCodeExpiresAt);

        $this->sendConfirmationEmail($visitor);

        return redirect()->route('confirmation', ['code' => $confirmationCode]);

    }

    public function store(Request $request, $confirmationCode, $confirmationCodeExpiresAt)
    {

        //        ddd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'second_name' => 'required',
            'first_last_name' => 'required',
            'second_last_name' => 'required',
            'email' => 'required|email|unique:visitors',
            'gender' => 'required',
            'accept_terms' => 'required',
            'join_specialists_program' => 'required',
        ]);

        $geolocation = $request->input('geolocation');

        return Visitor::create([
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'first_last_name' => $request->input('first_last_name'),
            'second_last_name' => $request->input('second_last_name'),
            'email' => $request->input('email'),
            'accept_terms' => $request->has('accept_terms'),
            'join_specialists_program' => $request->has('join_specialists_program'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'nationality' => $request->input('nationality'),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'device' => $this->getDeviceType($request->header('User-Agent')),
            'password' => bcrypt($request->input('password')),
            'confirmation_code' => $confirmationCode,
            'confirmation_code_expires_at' => $confirmationCodeExpiresAt,
        ]);
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

    public function show(Visitor $visitor)
    {
        return view('visitor.profile');
    }

    public function edit(Request $request)
    {
        return redirect()->route('visitor.profile');
    }

    public function update(Request $request)
    {
        $user = auth('visitor')->user()->id;
        $visitor = Visitor::findOrFail($user);

        if ($this->isDataChanged($visitor, $request)) {
            $visitor->update([
                'first_name' => $request->input('first_name'),
                'second_name' => $request->input('second_name'),
                'first_last_name' => $request->input('first_last_name'),
                'second_last_name' => $request->input('second_last_name'),
                'email' => $request->input('email'),
                'nationality' => $request->input('nationality'),
                'phone' => $request->input('phone'),
                'accept_terms' => $request->has('accept_terms'),
                'join_specialists_program' => $request->has('join_specialists_program'),
            ]);

            return back()->with('success', 'Información personal actualizada');
        } else {
            return back()->with('info', 'No se detectaron cambios');
        }
    }

    private function isDataChanged($visitor, $request)
    {
        return $visitor->first_name != $request->input('first_name') ||
            $visitor->second_name != $request->input('second_name') ||
            $visitor->first_last_name != $request->input('first_last_name') ||
            $visitor->second_last_name != $request->input('second_last_name') ||
            $visitor->email != $request->input('email') ||
            $visitor->nationality != $request->input('nationality') ||
            $visitor->phone != $request->input('phone') ||
            $visitor->accept_terms != $request->has('accept_terms') ||
            $visitor->join_specialists_program != $request->has('join_specialists_program');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        //
    }

    public function updateOnEvent(Request $request, $visitorId)
    {
        // Encuentra el visitante
        $visitor = Visitor::findOrFail($visitorId);
        $visitor->update(['on_event' => $request->has('on_event')]);
        return redirect()->back()->with('success', 'Estado actualizado exitosamente');
    }
}
