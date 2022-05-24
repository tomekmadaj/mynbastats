<?php

declare(strict_types=1);

namespace App\Repository;

use DOMDocument;
use App\Model\Team;
use App\Model\Player;
use App\Model\Schedule;
use App\Model\Standing;
use App\Model\GameLeaders;
use App\Model\Player_Stat;
use App\Model\Team_Leader;
use App\Model\GameBoxscore;
use App\Model\PlayerBoxscore;
use App\Model\Teams_Stats_Ranking;
use Illuminate\Support\Facades\Auth;

class NbaRepository
{
    const CURRENT_SEASON = '2021';

    private Team $teamModel;
    private Player $playerModel;
    private Standing $standingModel;
    private Player_stat $playerStatModel;
    private Teams_Stats_Ranking $teamStatsRankingModel;
    private Schedule $scheduleModel;
    private GameBoxscore $gameBoxscoreModel;
    private GameLeaders $gameLeadersModel;
    private PlayerBoxscore $playerBoxscoreModel;

    public function __construct(
        Team $teamModel,
        Player $playerModel,
        Standing $standingModel,
        Player_Stat $playerStatModel,
        Teams_Stats_Ranking $teamsStatsRankingModel,
        Team_Leader $teamLeadersModel,
        Schedule $scheduleModel,
        GameBoxscore $gameBoxscoreModel,
        GameLeaders $gameLeadersModel,
        PlayerBoxscore $playerBoxscore
    ) {
        $this->teamModel = $teamModel;
        $this->playerModel = $playerModel;
        $this->standingModel = $standingModel;
        $this->playerStatModel = $playerStatModel;
        $this->teamStatsRankingModel = $teamsStatsRankingModel;
        $this->teamLeadersModel = $teamLeadersModel;
        $this->scheduleModel = $scheduleModel;
        $this->gameBoxscoreModel = $gameBoxscoreModel;
        $this->gameLeadersModel = $gameLeadersModel;
        $this->playerBoxscoreModel = $playerBoxscore;
    }

    public function standingsWest()
    {
        $standings = $this->standingModel
            ->with('teams')
            ->where('conference', '=', 'west')
            ->get();

        return $standings;
    }

    public function standingsEast()
    {
        $standings = $this->standingModel
            ->with('teams')
            ->where('conference', '=', 'east')
            ->get();

        return $standings;
    }

    public function playerStats($personId, $seasonYear = self::CURRENT_SEASON)
    {
        $playerStats = $this->playerStatModel
            ->with('players', 'teams')
            ->where([
                ['personId', '=', $personId],
                ['seasonYear', '=', $seasonYear]
            ])->first();

        return $playerStats;
    }

    public function teamStats($teamId)
    {
        $teamStats = $this->teamStatsRankingModel
            ->with('teams')
            ->where('teamId', '=', $teamId)
            ->first();

        return $teamStats;
    }

    public function teamPlayersStats($teamId, $seasonYear = self::CURRENT_SEASON)
    {
        $teamPlayersStats = $this->playerStatModel
            ->with('players')
            ->where([
                ['teamId', '=', $teamId],
                ['seasonYear', '=', $seasonYear]
            ])
            ->sortable()
            ->orderBy('ppg', 'DESC')
            ->get();

        return $teamPlayersStats;
    }

    public function getUserPlayer($personId)
    {
        $userPlayer = $this->playerModel
            ->with('teams')
            ->find($personId);

        return $userPlayer;
    }

    public function getUserTeam($teamId)
    {
        $userTeam = $this->teamModel
            ->find($teamId);

        return $userTeam;
    }

    public function teamLeaders($stat, $seasonYear = self::CURRENT_SEASON, $teamId = null)
    {
        $teamLeaders = $this->playerStatModel
            ->with(['players', 'teams'])
            ->bestStats($stat, $seasonYear, $teamId)
            ->get();

        return $teamLeaders;
    }

    public function playerSeasons($personId)
    {
        $playerSeasons = $this->playerStatModel
            ->where([
                ['personId', '=', $personId],
                ['seasonYear', '!=', 'careerSummary']
            ])
            ->get('seasonYear');

        return $playerSeasons;
    }

    public function getLatestPlayerStats($personId)
    {
        $latestPlayerStats = $this->playerBoxscoreModel
            ->with('schedule.hTeams', 'schedule.vTeams')
            ->where('personId', '=', $personId)
            ->limit(5)
            ->orderBy('date', 'DESC')
            ->get();

        return $latestPlayerStats;
    }

    public function getLatestGames($teamId = null)
    {
        if ($teamId) {
            $latestGames = $this->scheduleModel
                ->userTeamSchedule($teamId)
                ->with('hTeams', 'vTeams', 'hTeamsLeaders', 'vTeamsLeaders', 'hTeamsBoxscore', 'vTeamsBoxscore')
                ->whereNotNull('hTeamScore')
                ->orderBy('date', 'DESC')
                ->limit(3)
                ->get();
        } else {
            $latestGames = $this->scheduleModel
                ->with('hTeams', 'vTeams', 'hTeamsLeaders', 'vTeamsLeaders', 'hTeamsBoxscore', 'vTeamsBoxscore')
                ->whereNotNull('hTeamScore')
                ->orderBy('date', 'DESC')
                ->limit(3)
                ->get();
        }

        return $latestGames;
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
        @$dom->loadHTMLFile($wikiPlayerUrl);

        if (empty($dom->documentURI)) {
            return '/images/michael-jordan.jpg';
        }

        $playerImageUrl = [];
        $className = 'image';
        $xpath = new \DOMXPath($dom);
        $results = $xpath->query("//*[@class='" . $className . "']");
        if ($results->length > 0) {
            foreach ($results as $result) {
                $playerImageUrl[] = $result->getAttribute('href');
            }
        } else {
            return '/images/michael-jordan.jpg';
        }

        $playerImageUrl = $playerImageUrl[0];
        $playerImageUrl = 'https://pl.wikipedia.org' . $playerImageUrl;


        @$dom->loadHTMLFile($playerImageUrl);

        $fileId = $dom->getElementById('file');
        $imagesTag = $fileId->getElementsByTagName('a');

        // dd($imagesTag);
        $playerImgFileUrl = '';

        foreach ($imagesTag as $image) {
            $playerImgFileUrl = $image->getAttribute('href');
        }

        if ($playerImgFileUrl == '') {
            return '/images/michael-jordan.jpg';
        }

        $playerImgFileUrl = 'https:' . $playerImgFileUrl;

        return $playerImgFileUrl;
    }
}
