<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PeriksaHakAkses
{
    /**
     * Menangani request masuk dan memvalidasi hak akses (permission) pengguna.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$permissions): Response
    {
        // 1. Pastikan pengguna telah login
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // 2. Jika tidak ada spesifikasi permission atau user memiliki salah satu izin akses
        if (empty($permissions)) {
            return $next($request);
        }

        foreach ($permissions as $permission) {
            if ($request->user()->hasPermission($permission)) {
                return $next($request);
            }
        }

        // 3. Tolak akses jika tidak memiliki izin yang sesuai
        abort(Response::HTTP_FORBIDDEN, 'Akses ditolak: Anda tidak memiliki hak akses yang diperlukan untuk tindakan ini.');
    }
}
