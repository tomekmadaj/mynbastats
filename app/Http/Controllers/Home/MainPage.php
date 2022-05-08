<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;
use App\Repository\NbaRepository;

class MainPage extends Controller
{
    private NbaRepository $nbaRepository;

    public function __construct(NbaRepository $nbaRepository)
    {
        $this->nbaRepository = $nbaRepository;
    }

    public function __invoke(HttpRequest $request)
    {
        //generowanie adresów url
        //$gameId = 44;
        //$url = url("games/$gameId");
        //$url = url()->current();
        //$url = url()->full();
        //$url = url()->previous();

        //$routeUrl = route('games.show', ['game' => $gameId]);
        //$routeUrl = route(
        //    'games.show',
        //    ['game' => $gameId, 'foo' => 'bar', 'test' => 1]
        //);

        // $actionUrl = action([GameController::class, 'dashboard']);
        // $actionUrl = action(
        //     [GameController::class, 'show'],
        //     ['game' => $gameId, 'foo' => 'bar']
        // );

        // dump($actionUrl);

        // dd('end');

        $user = Auth::user();

        // $user = $request->user();

        // $id = Auth::id();

        // if (Auth::check()) {
        // }

        // Auth::logout();

        $teams = $this->nbaRepository->all();

        $players = $this->nbaRepository->LakersPlayers();

        $standingsWest = $this->nbaRepository->standingsWest();

        $standingsEast = $this->nbaRepository->standingsEast();

        $playerStats = $this->nbaRepository->playerStats('101108', 'last');

        $teamStats = $this->nbaRepository->teamStats('1610612738');


        return view('home.main', [
            'user' => $user,
            'teams' => $teams,
            'players' => $players,
            'standingsWest' => $standingsWest,
            'standingsEast' => $standingsEast,
            'playerStats' => $playerStats,
            'teamStats' => $teamStats
        ]);
    }
}
