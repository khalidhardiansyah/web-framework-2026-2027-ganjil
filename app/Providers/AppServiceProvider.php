<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate untuk Menu Admin
        Gate::define('akses-admin', function (User $user): bool {
            return $user->hasRole('admin') || $user->hasPermission('akses-admin');
        });

        // Gate untuk Menu Manager
        Gate::define('akses-manager', function (User $user): bool {
            return $user->hasRole(['admin', 'manager']) || $user->hasPermission('akses-manager');
        });

        // Gate untuk Menu User / Mahasiswa
        Gate::define('akses-user', function (User $user): bool {
            return $user->hasRole(['admin', 'manager', 'user']) || $user->hasPermission('akses-user');
        });

        // Gate untuk Kelola Pengguna
        Gate::define('kelola-pengguna', function (User $user): bool {
            return $user->hasRole('admin') || $user->hasPermission('kelola-pengguna');
        });
    }
}
