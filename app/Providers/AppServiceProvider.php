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
        // Gate::define('admin', function (User $user) {
        //     return $user->is_admin;
        // });

        // Gate::define('capt', function (User $user) {
        //     return $user->is_admin == 2;
        // });
        Gate::define('admin', function (User $user) {
            return $user->is_admin == 1;
        });

        // Hanya user dengan is_admin == 2
        Gate::define('capt', function (User $user) {
            return $user->is_admin == 2;
        });
    }
}
