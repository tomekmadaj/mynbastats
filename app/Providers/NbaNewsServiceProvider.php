<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Nba\NbaNewsRepository;
use App\Repository\NbaNewsRepositoryInterface;

class NbaNewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            NbaNewsRepositoryInterface::class, //wskazujemy interface
            NbaNewsRepository::class //wskazujemy jego implementację
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
