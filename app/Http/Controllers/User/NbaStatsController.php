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

    public function team(Request $request): View
    {
        $user = Auth::user();
        $personId = $user->personId;
        $teamId = $user->teamId;

        $playerData = $this->nbaRepository->getUserPlayer($personId);
        $teamData = $this->nbaRepository->getUserTeam($teamId);

        $teamStatsData = $this->nbaRepository->teamStats($teamId);

        $pointLeaders = $this->nbaRepository->teamLeaders(stat: 'ppg', teamId: $teamId);
        $reboundsLeaders = $this->nbaRepository->teamLeaders(stat: 'rpg', teamId: $teamId);
        $assistsLeaders = $this->nbaRepository->teamLeaders(stat: 'apg', teamId: $teamId);
        $blocksLeaders = $this->nbaRepository->teamLeaders(stat: 'bpg', teamId: $teamId);

        $teamPlayersStats = $this->nbaRepository->teamPlayersStats($teamId);

        $latestUserTeamGames = $this->nbaRepository->getLatestGames($teamId);


        return view('nbaStats.team', [
            'user' => $user,
            'player' => $playerData,
            'team' => $teamData,
            'teamStats' => $teamStatsData,
            'pointsLeaders' => $pointLeaders,
            'reboundsLeaders' => $reboundsLeaders,
            'assistsLeaders' => $assistsLeaders,
            'blocksLeaders' => $blocksLeaders,
            'teamPlayersStats' => $teamPlayersStats,
            'latestUserTeamGames' => $latestUserTeamGames
        ]);
    }

    public function player(Request $request): View
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

        $playerImageUrl = $this->nbaRepository->getPlayerImageUrl($personId);

        $latestPlayerStats = $this->nbaRepository->getLatestPlayerStats($personId);

        // dd($playerImageUrl);

        return view('nbaStats.player', [
            'user' => $user,
            'player' => $playerData,
            'team' => $teamData,
            'playerSeasonStats' => $playerSeasonStatsData,
            'playerCareerStats' => $playerCareerStatsData,
            'playerSeasons' => $playerSeasons,
            'playerImageUrl' => $playerImageUrl,
            'latestPlayerStats' => $latestPlayerStats,
        ]);
    }
}
