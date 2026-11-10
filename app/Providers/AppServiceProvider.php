<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // <-- Pastikan ini di-import

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Membuat Gate untuk otorisasi pengelolaan pengguna
        Gate::define('manage-users', function ($user) {
            return $user->role === 'admin';
        });
    }
}