<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use function Symfony\Component\Translation\t;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        //
    ];


    public function boot(): void
    {

        Gate::define('user', function (User $user) {
            return $user->role->id == 1;
        });


        Gate::define('create-department', function (User $user) {
            return $user->role->id == 1;
        });

        Gate::define('update-department', function (User $user) {
            return $user->role->id = 1;
        });


    }
}
