<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;
use App\Model\Player;
use App\Model\Standing;
use App\Model\Player_Stat;
use App\Model\Teams_Stats_Ranking;

class NbaRepository
{
    private Team $teamModel;
    private Player $playerModel;
    private Standing $standingModel;
    private Player_stat $playerStatModel;
    private Teams_Stats_Ranking $teamStatsRankingModel;

    public function __construct(Team $teamModel, Player $playerModel, Standing $standingModel, Player_Stat $playerStatModel, Teams_Stats_Ranking $teamsStatsRankingModel)
    {
        $this->teamModel = $teamModel;
        $this->playerModel = $playerModel;
        $this->standingModel = $standingModel;
        $this->playerStatModel = $playerStatModel;
        $this->teamStatsRankingModel = $teamsStatsRankingModel;
    }

    public function all()
    {
        return $this->teamModel->where('id', '<>', 0)->get();
    }

    public function LakersPlayers()
    {
        $lakersPlayers = $this->playerModel->with('teams')->whereHas('teams', function ($query) {
            return $query->where('tricode', '=', 'LAL');
        })->get();

        return $lakersPlayers;
    }

    public function standingsWest()
    {
        $standings = $this->standingModel->with('teams')->where('conference', '=', 'west')->get();

        return $standings;
    }

    public function standingsEast()
    {
        $standings = $this->standingModel->with('teams')->where('conference', '=', 'east')->get();

        return $standings;
    }

    public function playerStats($personId, $seasonYear)
    {
        if ($seasonYear = 'last')
            $seasonYear = '2021';

        $playerStats = $this->playerStatModel->with('players')->with('teams')->where('personId', '=', $personId)->where('seasonYear', '=', $seasonYear)->get();

        return $playerStats;
    }

    public function teamStats($teamId)
    {
        $teamStats = $this->teamStatsRankingModel->with('teams')->where('teamId', '=', $teamId)->get();
        // dd($teamStats);

        return $teamStats;
    }
}
