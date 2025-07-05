<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }
        // Redirect ke dashboard sesuai role user yang login
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif (auth()->user()->role === 'approver') {
                return redirect('/approver/dashboard');
            }
        }
        return redirect('/login');
    }
}
