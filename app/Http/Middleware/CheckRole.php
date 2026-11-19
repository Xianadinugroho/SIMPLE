<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek user via session (web guard)
        $user = $request->user();

        // Kalau belum login → redirect ke /login
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Cek role user
        if (!in_array($user->role, $roles)) {
            // Redirect ke dashboard sesuai role user
            $redirects = [
                'kurikulum' => '/dashboard/kurikulum',
                'guru'      => '/dashboard/guru',
                'siswa'     => '/dashboard/siswa',
            ];
            
            return redirect($redirects[$user->role] ?? '/login')
                ->with('error', 'Akses ditolak! Anda tidak memiliki izin.');
        }

        return $next($request);
    }
}