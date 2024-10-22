<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($role === 'admin' && $user->role !== 'admin') {
                return redirect()->route('user.dashboard');
            } elseif ($role === 'user' && $user->role !== 'user') {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
