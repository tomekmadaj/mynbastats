<?php

declare(strict_types=1);

namespace App\Repository\Nba;

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
use Illuminate\Support\Collection;
use App\Repository\NbaRepositoryInterface;

class NbaRepository implements NbaRepositoryInterface
{
    private Player $playerModel;
    private Team $teamModel;
    private Standing $standingModel;
    private Player_stat $playerStatModel;
    private Teams_Stats_Ranking $teamStatsRankingModel;
    private Schedule $scheduleModel;
    private PlayerBoxscore $playerBoxscoreModel;

    public function __construct(
        Player $playerModel,
        Team $teamModel,
        Player_Stat $playerStatModel,
        Standing $standingModel,
        Teams_Stats_Ranking $teamsStatsRankingModel,
        Team_Leader $teamLeadersModel,
        Schedule $scheduleModel,
        GameBoxscore $gameBoxscoreModel,
        GameLeaders $gameLeadersModel,
        PlayerBoxscore $playerBoxscore
    ) {
        $this->playerModel = $playerModel;
        $this->teamModel = $teamModel;
        $this->playerStatModel = $playerStatModel;
        $this->standingModel = $standingModel;
        $this->teamStatsRankingModel = $teamsStatsRankingModel;
        $this->teamLeadersModel = $teamLeadersModel;
        $this->scheduleModel = $scheduleModel;
        $this->gameBoxscoreModel = $gameBoxscoreModel;
        $this->gameLeadersModel = $gameLeadersModel;
        $this->playerBoxscoreModel = $playerBoxscore;
    }

    public function getPlayer($personId): Player
    {
        $userPlayer = $this->playerModel
            ->with('teams')
            ->find($personId);

        return $userPlayer;
    }

    public function getTeam($teamId): Team
    {
        $userTeam = $this->teamModel
            ->find($teamId);

        return $userTeam;
    }

    public function standingsWest(): Collection
    {
        $standings = $this->standingModel
            ->with('teams')
            ->west()
            ->get();

        return $standings;
    }

    public function standingsEast(): Collection
    {
        $standings = $this->standingModel
            ->with('teams')
            ->east()
            ->get();

        return $standings;
    }

    public function teamStats($teamId)
    {
        $teamStats = $this->teamStatsRankingModel
            ->with('teams')
            ->where('teamId', '=', $teamId)
            ->first();

        return $teamStats;
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

    public function playerSeasons($personId): Collection
    {
        $playerSeasons = $this->playerStatModel
            ->where([
                ['personId', '=', $personId],
                ['seasonYear', '!=', 'careerSummary']
            ])
            ->get('seasonYear');

        return $playerSeasons;
    }

    public function latestPlayerStats($personId): Collection
    {
        $latestPlayerStats = $this->playerBoxscoreModel
            ->with('schedule.hTeams', 'schedule.vTeams')
            ->where('personId', '=', $personId)
            ->limit(self::LATEST_PLAYER_GAMES)
            ->orderBy('date', 'DESC')
            ->get();

        return $latestPlayerStats;
    }

    public function teamPlayersStats($teamId, $seasonYear = self::CURRENT_SEASON): Collection
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

    public function teamLeaders($stat, $seasonYear = self::CURRENT_SEASON, $teamId = null): Collection
    {
        $teamLeaders = $this->playerStatModel
            ->with(['players', 'teams'])
            ->bestStats($stat, $seasonYear, $teamId)
            ->get();

        return $teamLeaders;
    }

    public function latestGames($teamId = null): Collection
    {
        if ($teamId) {
            $latestGames = $this->scheduleModel
                ->teamSchedule($teamId)
                ->with('hTeams', 'vTeams', 'hTeamsLeaders', 'vTeamsLeaders', 'hTeamsBoxscore', 'vTeamsBoxscore')
                ->whereNotNull('hTeamScore')
                ->orderBy('date', 'DESC')
                ->limit(self::LATEST_TEAM_GAMES)
                ->get();
        } else {
            $latestGames = $this->scheduleModel
                ->with('hTeams', 'vTeams', 'hTeamsLeaders', 'vTeamsLeaders', 'hTeamsBoxscore', 'vTeamsBoxscore')
                ->whereNotNull('hTeamScore')
                ->orderBy('date', 'DESC')
                ->limit(self::LATEST_TEAM_GAMES)
                ->get();
        }
        return $latestGames;
    }

    public function getPlayerImage($personId)
    {
        $player = $this->getPlayer($personId);

        $playerFirstName = $player->firstName;
        $playerlastName = $player->lastName;
        // !str_contains($playerFirstName, '-') ?: $playerFirstName = substr($playerFirstName, 0, strpos($playerFirstName, '-'));

        $wikiPlayerUrl = 'https://pl.wikipedia.org/wiki/firstName_lastName';
        $wikiPlayerUrl = str_replace(['firstName', 'lastName'], [$playerFirstName, $playerlastName], $wikiPlayerUrl);

        $dom = new DOMDocument();
        @$dom->loadHTMLFile($wikiPlayerUrl);

        if (empty($dom->documentURI)) {
            return [
                'playerImgFileUrl' => '/images/michael-jordan.jpg',
                'imgFileSrc' => null
            ];
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
            return [
                'playerImgFileUrl' => '/images/michael-jordan.jpg',
                'imgFileSrc' => null
            ];
        }

        $playerImageUrl = $playerImageUrl[0];
        $playerImageUrl = 'https://pl.wikipedia.org' . $playerImageUrl;


        @$dom->loadHTMLFile($playerImageUrl);

        $fileId = $dom->getElementById('file');
        $imagesTag = $fileId->getElementsByTagName('a');

        $playerImgFileUrl = '';
        foreach ($imagesTag as $image) {
            $playerImgFileUrl = $image->getAttribute('href');
        }

        $playerImgFileUrl = 'https:' . $playerImgFileUrl;

        $fileSrc = $dom->getElementById('fileinfotpl_src');
        $fileSrcTag = $fileSrc->nextElementSibling->getElementsByTagName('a');

        $imgFileSrc = '';
        foreach ($fileSrcTag as $src) {
            $imgFileSrc = $src->getAttribute('href');
        }

        return [
            'playerImgFileUrl' => $playerImgFileUrl,
            'imgFileSrc' => $imgFileSrc
        ];
    }
}