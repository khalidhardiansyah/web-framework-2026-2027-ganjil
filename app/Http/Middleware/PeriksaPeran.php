<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PeriksaPeran
{
    /**
     * Menangani request masuk dan memvalidasi peran pengguna.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // 1. Pastikan pengguna telah login
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // 2. Jika tidak ada spesifikasi role atau user memiliki salah satu role yang ditentukan
        if (empty($roles) || $request->user()->hasRole($roles)) {
            return $next($request);
        }

        // 3. Tolak akses jika tidak memiliki peran yang sesuai
        abort(Response::HTTP_FORBIDDEN, 'Akses ditolak: Anda tidak memiliki peran yang diizinkan untuk mengakses halaman ini.');
    }
}
