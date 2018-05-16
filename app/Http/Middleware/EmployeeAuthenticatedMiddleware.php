<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployeeAuthenticatedMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::guard('employees')->check()) {
            return redirect('/login')->withErrors(['errors' => 'You have to login first']);
        }
        return $next($request);
    }

}
