<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;
use App\Model\Player;
use Illuminate\Support\Collection;

interface NbaRepositoryInterface
{
    const CURRENT_SEASON = '2021';
    const LATEST_PLAYER_GAMES = 5;
    const LATEST_TEAM_GAMES = 3;

    public function getPlayer($personId): Player;

    public function getTeam($personId): Team;

    public function standingsWest(): Collection;

    public function standingsEast(): Collection;

    public function teamStats($teamId);

    public function playerStats($personId, $seasonYear = self::CURRENT_SEASON);

    public function playerSeasons($personId): Collection;

    public function latestPlayerStats($personId): Collection;

    public function teamPlayersStats($teamId, $seasonYear = self::CURRENT_SEASON): Collection;

    public function teamLeaders($stat, $seasonYear = self::CURRENT_SEASON, $teamId = null): Collection;

    public function latestGames($teamId = null): Collection;

    public function getPlayerImage($personId);
}
