<?php

namespace App\Providers;

use App\Repository\Nba\NbaRepository;
use App\Repository\NbaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class NbaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            NbaRepositoryInterface::class, //wskazujemy interface
            NbaRepository::class //wskazujemy jego implementację
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
