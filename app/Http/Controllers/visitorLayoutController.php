<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;

class visitorLayoutController extends Controller
{
    public function edit()
    {

        $user = auth()->guard('visitor')->user();

        if ($user) {
            $userlog = $user->id;
            $eventos = Visitor::find($userlog)->events->all();
            return view('layouts.visitorLayout', [
                'events' => $eventos
            ]);
        } else {
            return view('layouts.visitorLayout');
        }
    }

    public function report($id)
    {
        $user = auth()->guard('visitor')->user();

        $fullName = $user->first_name . ' ' . $user->second_name . ' ' . $user->first_last_name . ' ' . $user->second_last_name;

        $event = Event::findOrfail($id);
        $pdf = Pdf::loadView('visitors.report',[
            'userName' => $fullName,
            'event' => $event
        ]);

        return $pdf->stream();

    }
}
