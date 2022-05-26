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
        return $this->playerModel
            ->with('teams')
            ->find($personId);
    }

    public function getTeam($teamId): Team
    {
        return $this->teamModel
            ->find($teamId);
    }

    public function standingsWest(): Collection
    {
        return $this->standingModel
            ->with('teams')
            ->west()
            ->get();
    }

    public function standingsEast(): Collection
    {
        return $this->standingModel
            ->with('teams')
            ->east()
            ->get();
    }

    public function teamStats($teamId)
    {
        return $this->teamStatsRankingModel
            ->with('teams')
            ->where('teamId', '=', $teamId)
            ->first();
    }

    public function playerStats($personId, $seasonYear = self::CURRENT_SEASON)
    {
        return $this->playerStatModel
            ->with('players', 'teams')
            ->where([
                ['personId', '=', $personId],
                ['seasonYear', '=', $seasonYear]
            ])->first();
    }

    public function playerSeasons($personId): Collection
    {
        return $this->playerStatModel
            ->where([
                ['personId', '=', $personId],
                ['seasonYear', '!=', 'careerSummary']
            ])
            ->get('seasonYear');
    }

    public function latestPlayerStats($personId): Collection
    {
        return $this->playerBoxscoreModel
            ->with('schedule.hTeams', 'schedule.vTeams')
            ->where('personId', '=', $personId)
            ->limit(self::LATEST_PLAYER_GAMES)
            ->orderBy('date', 'DESC')
            ->get();
    }

    public function teamPlayersStats($teamId, $seasonYear = self::CURRENT_SEASON): Collection
    {
        return $this->playerStatModel
            ->with('players')
            ->where([
                ['teamId', '=', $teamId],
                ['seasonYear', '=', $seasonYear]
            ])
            ->sortable()
            ->orderBy('ppg', 'DESC')
            ->get();
    }

    public function teamLeaders($stat, $seasonYear = self::CURRENT_SEASON, $teamId = null): Collection
    {
        return $this->playerStatModel
            ->with(['players', 'teams'])
            ->bestStats($stat, $seasonYear, $teamId)
            ->get();
    }

    public function latestGames($teamId = null): Collection
    {
        if ($teamId) {
            return $this->scheduleModel
                ->teamSchedule($teamId)
                ->with('hTeams', 'vTeams', 'hTeamsLeaders', 'vTeamsLeaders', 'hTeamsBoxscore', 'vTeamsBoxscore')
                ->whereNotNull('hTeamScore')
                ->orderBy('date', 'DESC')
                ->limit(self::LATEST_TEAM_GAMES)
                ->get();
        } else {
            return $this->scheduleModel
                ->with('hTeams', 'vTeams', 'hTeamsLeaders', 'vTeamsLeaders', 'hTeamsBoxscore', 'vTeamsBoxscore')
                ->whereNotNull('hTeamScore')
                ->orderBy('date', 'DESC')
                ->limit(self::LATEST_TEAM_GAMES)
                ->get();
        }
    }

    public function getPlayerImage($personId)
    {
        $player = $this->getPlayer($personId);

        $wikiPlayerUrl = str_replace(
            ['firstName', 'lastName'],
            [$player->firstName, $player->lastName],
            'https://pl.wikipedia.org/wiki/firstName_lastName'
        );

        $dom = new DOMDocument();
        @$dom->loadHTMLFile($wikiPlayerUrl);

        if (empty($dom->documentURI)) {
            return [
                'playerImgFileUrl' => '/images/michael-jordan.jpg',
                'imgFileSrc' => null
            ];
        }

        $xpath = new \DOMXPath($dom);
        $results = $xpath->query("//*[@class='" . 'image' . "']");
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
        $playerImageUrl = 'https://pl.wikipedia.org' . $playerImageUrl[0];


        @$dom->loadHTMLFile($playerImageUrl);
        $fileId = $dom->getElementById('file');
        $imagesTag = $fileId->getElementsByTagName('a');
        foreach ($imagesTag as $image) {
            $playerImgFileUrl = 'https:' . $image->getAttribute('href');
        }

        $fileSrc = $dom->getElementById('fileinfotpl_src');
        $fileSrcTag = $fileSrc->nextElementSibling->getElementsByTagName('a');
        foreach ($fileSrcTag as $src) {
            $imgFileSrc = $src->getAttribute('href');
        }

        return [
            'playerImgFileUrl' => $playerImgFileUrl,
            'imgFileSrc' => $imgFileSrc
        ];
    }
}
