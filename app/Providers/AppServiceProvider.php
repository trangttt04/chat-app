<?php

namespace App\Providers;

use App\Models\{
    Role,
    User
};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Gate::define('roles', function (User $user, Role $role) {
            return array_search($role->id, $user->roles->pluck('id')->toArray()) !== false;
        });
    }

    public function boot(): void
    {

    }
}
