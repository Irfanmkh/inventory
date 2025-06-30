<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Ganti sesuai kolom nama role pada model Pengguna
        if ($user->role !== $role) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
