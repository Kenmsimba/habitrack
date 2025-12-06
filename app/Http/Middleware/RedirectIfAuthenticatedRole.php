<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->isLandlord()) {
                return redirect()->route('landlord.apartments.index'); // or /landlord/apartments
            }

            if ($user->isTenant()) {
                return redirect()->route('tenant.apartments.index');
            }

            return redirect('/contact');
        }

        return $next($request);
    }
}