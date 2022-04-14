<?php

namespace App\Providers;

use App\Model\User;
use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepository as UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(UserRepositoryInterface::class, function ($app) {
        //     return new UserRepository(
        //         $app->make(User::class)
        //     );
        // });

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
