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

        $standingsWest = $this->nbaRepository->standingsWest();

        $standingsEast = $this->nbaRepository->standingsEast();

        // $teamLeaders = $this->nbaRepository->teamLeaders('1610612738');
        //dd($teamLeaders);

        $pointLeaders = $this->nbaRepository->teamLeaders('all', 'ppg', $this->nbaRepository::CURRENT_SEASON);
        $reboundsLeaders = $this->nbaRepository->teamLeaders('all', 'rpg', $this->nbaRepository::CURRENT_SEASON);
        $assistsLeaders = $this->nbaRepository->teamLeaders('all', 'apg', $this->nbaRepository::CURRENT_SEASON);
        $blocksLeaders = $this->nbaRepository->teamLeaders('all', 'bpg', $this->nbaRepository::CURRENT_SEASON);

        // dd($pointLeaders);

        return view('home.main', [
            'user' => $user,
            'standingsWest' => $standingsWest,
            'standingsEast' => $standingsEast,
            'pointsLeaders' => $pointLeaders,
            'reboundsLeaders' => $reboundsLeaders,
            'assistsLeaders' => $assistsLeaders,
            'blocksLeaders' => $blocksLeaders,
        ]);
    }
}
