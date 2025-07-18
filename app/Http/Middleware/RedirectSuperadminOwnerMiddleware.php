<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectSuperadminOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa jika pengguna telah log masuk dan mempunyai peranan 'admin' atau 'owner'
        if (Auth::check() && in_array(Auth::user()->role, ['superadmin', 'owner'])) {
            // Jika ya, arahkan mereka ke dashboard admin
            return redirect()->route('admin.dashboard.index');
        }

        return $next($request);
    }
}
