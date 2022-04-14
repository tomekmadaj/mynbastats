<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-level', function (User $user) {
            
            if ($user->isAdmin()) {
                return Response::allow(); 
            } else {
                return Response::deny('Musisz mieć uprawnienia administratora');
            }

            return $user->isAdmin(); 
        });

        //możemy dodać kolejne parametry do przekazania 
        // Gate::define('admin-level', function (User $user, bool $access) {
        //     return $access;
        // });
    }
}
