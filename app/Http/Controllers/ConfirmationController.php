<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationResendCodeMail;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ConfirmationController extends Controller
{
    public function confirmEmail($code)
    {
        $visitor = Visitor::where('confirmation_code', $code)
            ->where('confirmation_code_expires_at', '>', now())
            ->first();
        if ($visitor && ! $visitor->confirmed) {

            $visitor->confirmed = true;
            $visitor->save();

            return view('confirmation.success');
        } elseif ($visitor && $visitor->confirmed) {

            return view('confirmation.alreadyConfirmed');
        } else {

            return view('confirmation.error');
        }
    }

    public function confirmationCodeResend(Request $request)
    {

        $confirmedVisitor = Visitor::where('email', $request->email)->first();
        if ($confirmedVisitor) {
            $confirmationCodeResend = Str::random(40);
            $confirmedVisitor->confirmation_code = $confirmationCodeResend;
            $confirmedVisitor->confirmation_code_expires_at = now()->addDay();
            $confirmedVisitor->save();
        }

        Mail::to($request->email)->send(new ConfirmationResendCodeMail($confirmedVisitor->confirmation_code));

        return view('confirmation.success');
    }
}
