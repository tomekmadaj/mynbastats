<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Team;
use App\Model\Player;
use App\Model\Standing;
use App\Model\Player_Stat;
use App\Model\Team_Leader;
use App\Model\Teams_Stats_Ranking;
use DOMDocument;
use Illuminate\Support\Facades\Auth;

class NbaRepository
{
    const CURRENT_SEASON = '2021';

    private Team $teamModel;
    private Player $playerModel;
    private Standing $standingModel;
    private Player_stat $playerStatModel;
    private Teams_Stats_Ranking $teamStatsRankingModel;
    private Team_Leader $teamLeadersModel;

    public function __construct(Team $teamModel, Player $playerModel, Standing $standingModel, Player_Stat $playerStatModel, Teams_Stats_Ranking $teamsStatsRankingModel, Team_Leader $teamLeadersModel)
    {
        $this->teamModel = $teamModel;
        $this->playerModel = $playerModel;
        $this->standingModel = $standingModel;
        $this->playerStatModel = $playerStatModel;
        $this->teamStatsRankingModel = $teamsStatsRankingModel;
        $this->teamLeadersModel = $teamLeadersModel;
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

    public function playerStats($personId, $seasonYear = self::CURRENT_SEASON)
    {
        $playerStats = $this->playerStatModel->with('players')->with('teams')->where('personId', '=', $personId)->where('seasonYear', '=', $seasonYear)->get();

        return $playerStats;
    }

    public function teamStats($teamId)
    {
        $teamStats = $this->teamStatsRankingModel->with('teams')->where('teamId', '=', $teamId)->get();

        return $teamStats;
    }

    // public function teamLeaders($teamId)
    // {
    //     $teamLeaders = $this->teamLeadersModel->with('teams')->where('teamId', '=', $teamId)->get();

    //     return $teamLeaders;
    // }

    //User Dashboard

    public function getUserPlayer($personId)
    {
        $userPlayer = $this->playerModel->find($personId);

        return $userPlayer;
    }

    public function getUserTeam($teamId)
    {

        $userTeam = $this->teamModel->find($teamId);

        return $userTeam;
    }

    public function teamLeaders($teamId, $stat, $seasonYear = '2021')
    {
        $teamLeaders = $this->playerStatModel->with(['players', 'teams'])->bestStats($teamId, $stat, $seasonYear)->get();

        return $teamLeaders;
    }

    public function playerSeasons($personId)
    {
        $playerSeasons = $this->playerStatModel->where('personId', '=', $personId)->where('seasonYear', '!=', 'careerSummary')
            ->get('seasonYear');

        return $playerSeasons;
    }

    public function getPlayerImageUrl($personId)
    {
        $player = $this->getUserPlayer($personId);
        $playerFirstName = $player->firstName;
        $playerlastName = $player->lastName;

        // !str_contains($playerFirstName, '-') ?: $playerFirstName = substr($playerFirstName, 0, strpos($playerFirstName, '-'));

        $wikiPlayerUrl = 'https://pl.wikipedia.org/wiki/firstName_lastName';
        $wikiPlayerUrl = str_replace(['firstName', 'lastName'], [$playerFirstName, $playerlastName], $wikiPlayerUrl);

        $dom = new DOMDocument();
        @$dom->loadHTMLFile("$wikiPlayerUrl");

        if (empty($dom->documentURI)) {
            return '/images/michael-jordan.jpg';
        }

        $playerImageFileUrl = '';
        $className = 'image';
        $xpath = new \DOMXPath($dom);
        $results = $xpath->query("//*[@class='" . $className . "']");

        if ($results->length > 0) {
            foreach ($results as $result) {
                $playerImageFileUrl = $result->getAttribute('href');
            }
        } else {
            return '/images/michael-jordan.jpg';
        }

        $playerImageFileUrl = 'https://pl.wikipedia.org' . $playerImageFileUrl;

        @$dom->loadHTMLFile($playerImageFileUrl);

        $fileId = $dom->getElementById('file');
        $imagesTag = $fileId->getElementsByTagName('a');

        // dd($imagesTag);
        $playerImgUrl = '';

        foreach ($imagesTag as $image) {
            $playerImgUrl = $image->getAttribute('href');
        }

        if ($playerImgUrl == '') {
            return '/images/michael-jordan.jpg';
        }

        $playerImgUrl = 'https:' . $playerImgUrl;

        return $playerImgUrl;
    }
}
