<?php

declare(strict_types = 1);

namespace App\Repository;

use App\Model\Team;
use App\Model\Player;

class NbaRepository
{
    private Team $teamModel;
    private Player $playerModel;

    public function __construct(Team $teamModel, Player $playerModel)
    {
        $this->teamModel = $teamModel;
        $this->playerModel = $playerModel;
    }

    public function all()
    {
        return $this->teamModel->get();
    }

    public function LakersPlayers()
    {
        $lakersPlayers = $this->playerModel->with('teams')->whereHas('teams', function ($query) {
            return $query->where('tricode', '=', 'LAL');
        })->get();

        return $lakersPlayers;
    }
}
