<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repository\NbaRepository;
use Illuminate\Support\Facades\Auth;

class NbaStatsController extends Controller
{
    private  NbaRepository $nbaRepository;

    public function __construct(NbaRepository $nbaRepository)
    {
        $this->nbaRepository = $nbaRepository;
    }

    public function dashboard(Request $request): View
    {
        $user = Auth::user();
        $personId = $user->personId;
        $teamId = $user->teamId;

        $playerSeasons = $this->nbaRepository->playerSeasons($personId);

        $seasonsData = $playerSeasons->map(function ($season) {
            return $season->only('seasonYear');
        })->toArray();
        $seasonsData = array_column($seasonsData, 'seasonYear');

        $seasonYear = $seasonsData[0];

        $seasonYear = $request->get('seasonYear') ?? $seasonYear;

        in_array($seasonYear, $seasonsData) ?: $seasonYear = $seasonsData[0];

        $playerData = $this->nbaRepository->getUserPlayer($personId);
        $teamData = $this->nbaRepository->getUserTeam($teamId);

        $playerSeasonStatsData = $this->nbaRepository->playerStats($personId, $seasonYear);

        $playerCareerStatsData = $this->nbaRepository->playerStats($personId, 'careerSummary');

        $teamStatsData = $this->nbaRepository->teamStats($teamId);

        $pointLeaders = $this->nbaRepository->teamLeaders($teamId, 'ppg');
        $reboundsLeaders = $this->nbaRepository->teamLeaders($teamId, 'rpg');
        $assistsLeaders = $this->nbaRepository->teamLeaders($teamId, 'apg');
        $blocksLeaders = $this->nbaRepository->teamLeaders($teamId, 'bpg');

        $playerImageUrl = $this->nbaRepository->getPlayerImageUrl($personId);

        $teamPlayersStats = $this->nbaRepository->teamPlayersStats($teamId);

        $latestPlayerStats = $this->nbaRepository->getLatestPlayerStats($personId);

        return view('nbaStats.dashboard', [
            'user' => $user,
            'player' => $playerData,
            'team' => $teamData,
            'playerSeasonStats' => $playerSeasonStatsData,
            'playerCareerStats' => $playerCareerStatsData,
            'teamStats' => $teamStatsData,
            'pointsLeaders' => $pointLeaders,
            'reboundsLeaders' => $reboundsLeaders,
            'assistsLeaders' => $assistsLeaders,
            'blocksLeaders' => $blocksLeaders,
            'playerSeasons' => $playerSeasons,
            'playerImageUrl' => $playerImageUrl,
            'teamPlayersStats' => $teamPlayersStats,
            'latestPlayerStats' => $latestPlayerStats
        ]);
    }
}
