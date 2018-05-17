<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticationMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::check()) {
            return redirect('admin/login')->withErrors(['errors' => 'You have to login as Admin']);
        }
        return $next($request);
    }

}
