<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\NbaRepositoryInterface;

class MainController extends Controller
{
    private NbaRepositoryInterface $nbaRepository;

    public function __construct(NbaRepositoryInterface $nbaRepository)
    {
        $this->nbaRepository = $nbaRepository;
    }

    public function home()
    {
        $user = Auth::user();
        $latestGames = $this->nbaRepository->latestGames();

        return view('home.main', [
            'user' => $user,
            'latestGames' => $latestGames
        ]);
    }

    public function standings()
    {
        $user = Auth::user();

        $standingsWest = $this->nbaRepository->standingsWest();
        $standingsEast = $this->nbaRepository->standingsEast();

        $pointLeaders = $this->nbaRepository->teamLeaders('ppg');
        $reboundsLeaders = $this->nbaRepository->teamLeaders('rpg');
        $assistsLeaders = $this->nbaRepository->teamLeaders('apg');
        $blocksLeaders = $this->nbaRepository->teamLeaders('bpg');

        return view('home.standings', [
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
