<?php

namespace App\Providers;

use App\Http\Controllers\Game\BuilderController;
use App\Model\Game;
use App\Repository\GameRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\GameRepository as EloquentGameRepository;
use App\Repository\Builder\GameRepository as BuilderGameRepository;

class GameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //dd($this->app);
        $this->app->bind(
            GameRepositoryInterface::class, //wskazujemy interface
            EloquentGameRepository::class //wskazujemy jego implementację
        );

        //przykład z domknięciem (callbackiem) uzywamy jeżeli potrzebujemy przekazać jakieś dodatkowe parametry
        // $this->app->bind(
        //     GameRepositoryInterface::class,
        //     function ($app) {
        //     $config = config('gameworld.myTest');
        //         return new GameRepository(
        //             //new Game()
        //             $app->make(Game::class),
        //              $config
        //         );
        //     }
        // );

        //singleton
        // $this->app->singleton(
        //     GameRepositoryInterface::class,
        //     function ($app) {
        //         //$config = config('gameworld.myTest');
        //         return new GameRepository(
        //             //new Game()
        //             $app->make(Game::class),
        //            // $config
        //         );
        //     }
        // );
            
        // context binding
        // $this->app->when(BuilderController::class)
        // ->needs(GameRepositoryInterface::class)
        // ->give(fn($app) => new BuilderGameRepository($app->make(Game::class)));

        //         $this->app->when(BuilderController::class)
        // ->needs(GameRepositoryInterface::class)
        // ->give(BuilderGameRepository::class);
    

        //wczytanie obiektu do fasady Game
        // $this->app->bind(
        //     'game',
        //     GameRepositoryInterface::class
        // );

        //wiemy, że to jest GameRepositoryInterface więc możemy użyć singleton
        $this->app->singleton(
            'game',
            GameRepositoryInterface::class
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
