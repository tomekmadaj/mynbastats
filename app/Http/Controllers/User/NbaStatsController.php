<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repository\NbaRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class NbaStatsController extends Controller
{
    private NbaRepositoryInterface $nbaRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(NbaRepositoryInterface $nbaRepository, UserRepositoryInterface $userRepository)
    {
        $this->nbaRepository = $nbaRepository;
        $this->userRepository = $userRepository;
    }

    public function team(): View
    {
        $user = Auth::user();
        $userData = $this->userRepository->getUserTeamAndPlayer($user);
        $teamId = $user->teamId;

        $teamStatsData = $this->nbaRepository->teamStats($teamId);

        $pointLeaders = $this->nbaRepository->teamLeaders(stat: 'ppg', teamId: $teamId);
        $reboundsLeaders = $this->nbaRepository->teamLeaders(stat: 'rpg', teamId: $teamId);
        $assistsLeaders = $this->nbaRepository->teamLeaders(stat: 'apg', teamId: $teamId);
        $blocksLeaders = $this->nbaRepository->teamLeaders(stat: 'bpg', teamId: $teamId);

        $teamPlayersStats = $this->nbaRepository->teamPlayersStats($teamId);

        $latestUserTeamGames = $this->nbaRepository->latestGames($teamId);

        return view('nbaStats.team', [
            'user' => $userData,
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

        $playerSeasons = $this->nbaRepository->playerSeasons($personId)->toArray();
        $seasonsData = array_column($playerSeasons, 'seasonYear');
        $seasonYear = $request->get('seasonYear') ?? $seasonsData[0];
        in_array($seasonYear, $seasonsData) ?: $seasonYear = $seasonsData[0];

        $userData = $this->userRepository->getUserTeamAndPlayer($user);
        $playerSeasonStatsData = $this->nbaRepository->playerStats($personId, $seasonYear);
        $playerCareerStatsData = $this->nbaRepository->playerStats($personId, 'careerSummary');
        $playerImageData = $this->nbaRepository->getPlayerImage($personId);
        $latestPlayerStatsData = $this->nbaRepository->latestPlayerStats($personId);

        return view('nbaStats.player', [
            'user' => $userData,
            'playerSeasonStats' => $playerSeasonStatsData,
            'playerCareerStats' => $playerCareerStatsData,
            'playerSeasons' => $seasonsData,
            'playerImageUrl' => $playerImageData,
            'latestPlayerStats' => $latestPlayerStatsData,
        ]);
    }
}
