<?php

namespace App\Http\Middleware;

use App\Models\UserSession;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSingleSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (auth()->guard('visitor')->check()) {
            $userId = auth('visitor')->id();
            $sessionId = session()->getId();

            $activeSession = UserSession::where('visitor_id', $userId)->first();

            if (!$activeSession || $activeSession->session_id !== $sessionId) {

                Auth::guard('visitor')->logout();

                if ($activeSession) {
                    $activeSession->delete();
                }

                return redirect()->route('facade');
            }
        }

        return $response;
    }
}
