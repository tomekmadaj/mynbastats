<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadGamesBoxscore extends Command
{
    private Factory $httpClient;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-games-boxscore {gameDate?} {gameId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load Nba games boxscore';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        $this->httpClient = $httpClient;
        parent::__construct();
    }

    private function getFinishedGames()
    {
        $finishedGamed = DB::table('schedule')->whereNotNull(['hTeamScore', 'vTeamScore'])->get(['gameId', 'date']);

        $finishedGamed = json_decode($finishedGamed, true);

        $gameBoxscoreUrl = config('nba.api.gameBoxscore');

        $gamesUrls = [];
        foreach ($finishedGamed as $game) {
            $gamesUrls[] = str_replace(['{{gameDate}}', '{{gameId}}'], [date('Ymd', strtotime($game['date'])), $game['gameId']], $gameBoxscoreUrl);
        }

        return $gamesUrls;
    }

    public function loadBoxscores()
    {
        $gamesUrl = $this->getFinishedGames();

        $this->loadGamesBoxScore($gamesUrl);

        $this->loadGamesLeaders($gamesUrl);

        $this->loadPlayersBoxscore($gamesUrl);
    }

    private function loadGamesBoxScore($gamesUrl)
    {
        $this->info('Loading finished games boxscores');
        $progressbar = $this->output->createProgressBar(count($gamesUrl));

        DB::table('games_boxscore')->truncate();

        foreach ($gamesUrl as $gameUrl) {
            $url = $gameUrl;
            $response = $this->httpClient->get($url);

            if ($response->failed()) {
                $this->error('Request failed. Status Code: ' . $response->status());
            }

            $responseJson = $response->json();

            if (!empty($responseJson['basicGameData']['gameId'])) {
                $gameId = $responseJson['basicGameData']['gameId'];
                $gameDate = $responseJson['basicGameData']['startDateEastern'];
                $hTeamId = $responseJson['basicGameData']['hTeam']['teamId'];
                $vTeamId = $responseJson['basicGameData']['vTeam']['teamId'];
                $gameBoxscore = $responseJson['stats'];

                $this->createGameBoxscore($gameBoxscore['hTeam'], $gameId, $gameDate, $hTeamId, true);
                $this->createGameBoxscore($gameBoxscore['vTeam'], $gameId, $gameDate, $vTeamId, false);

                $progressbar->advance();
            }
        }

        $progressbar->finish();
        $this->newLine();
        $this->info('Finished games boxscores load succesfull');
        $this->newLine();
    }

    private function loadGamesLeaders($gamesUrl)
    {
        $this->info('Loading finished games leaders');
        $progressbar = $this->output->createProgressBar(count($gamesUrl));

        DB::table('games_leaders')->truncate();

        foreach ($gamesUrl as $gameUrl) {
            $url = $gameUrl;

            $response = $this->httpClient->get($url);

            if ($response->failed()) {
                $this->error('Request failed. Status Code: ' . $response->status());
            }

            $responseJson = $response->json();

            if (!empty($responseJson['basicGameData']['gameId'])) {
                $gameId = $responseJson['basicGameData']['gameId'];
                $gameDate = $responseJson['basicGameData']['startDateEastern'];
                $hTeamId = $responseJson['basicGameData']['hTeam']['teamId'];
                $vTeamId = $responseJson['basicGameData']['vTeam']['teamId'];
                $gameBoxscore = $responseJson['stats'];

                $progressbar->advance();

                $this->createGameLeader($gameBoxscore['hTeam']['leaders'], $gameId, $gameDate, $hTeamId);
                $this->createGameLeader($gameBoxscore['vTeam']['leaders'], $gameId, $gameDate, $vTeamId);
            }
        }
        $progressbar->finish();
        $this->newLine();
        $this->info('Finished games leaders load succesfull');
        $this->newLine();
    }

    private function loadPlayersBoxscore($gamesUrl)
    {
        $this->info('Loading finished games players boxscores');
        $progressbar = $this->output->createProgressBar(count($gamesUrl));

        DB::table('games_players_boxscore')->truncate();

        foreach ($gamesUrl as $gameUrl) {
            $url = $gameUrl;

            $response = $this->httpClient->get($url);

            if ($response->failed()) {
                $this->error('Request failed. Status Code: ' . $response->status());
            }

            $responseJson = $response->json();

            if (!empty($responseJson['basicGameData']['gameId'])) {
                $gameId = $responseJson['basicGameData']['gameId'];
                $gameDate = $responseJson['basicGameData']['startDateEastern'];
                $gameBoxscore = $responseJson['stats'];

                foreach ($gameBoxscore['activePlayers'] as $playerBoxscore) {
                    $this->createPlayerBoxscore($playerBoxscore, $gameId, $gameDate);
                }

                $progressbar->advance();
            }
        }
        $progressbar->finish();
        $this->newLine();
        $this->info('Finished games players boxscores load succesfull');
    }

    private function createGameBoxscore($boxScore, $gameId, $gameDate, $teamId, $isHTeam)
    {
        $result = DB::transaction(function () use ($boxScore, $gameId, $gameDate, $teamId, $isHTeam) {
            $boxScore = [
                'gameId' => $gameId,
                'date' => $gameDate,
                'teamId' => $teamId,
                'isHTeam' => $isHTeam ?? null,
                'fastBreakPoints' => $boxScore['fastBreakPoints'] ?? null,
                'pointsInPaint' => $boxScore['pointsInPaint'] ?? null,
                'biggestLead' => $boxScore['biggestLead'] ?? null,
                'secondChancePoints' => $boxScore['secondChancePoints'] ?? null,
                'pointsOffTurnovers' => $boxScore['pointsOffTurnovers'] ?? null,
                'longestRun' => $boxScore['longestRun'] ?? null,
                'points' => $boxScore['totals']['points'] ?? null,
                'fgm' => $boxScore['totals']['fgm'] ?? null,
                'fga' => $boxScore['totals']['fga'] ?? null,
                'fgp' => $boxScore['totals']['fgp'] ?? null,
                'ftm' => $boxScore['totals']['ftm'] ?? null,
                'fta' => $boxScore['totals']['fta'] ?? null,
                'ftp' => $boxScore['totals']['ftp'] ?? null,
                'tpm' => $boxScore['totals']['tpm'] ?? null,
                'tpa' => $boxScore['totals']['tpa'] ?? null,
                'tpp' => $boxScore['totals']['tpp'] ?? null,
                'offReb' => $boxScore['totals']['offReb'] ?? null,
                'defReb' => $boxScore['totals']['defReb'] ?? null,
                'totReb' => $boxScore['totals']['totReb'] ?? null,
                'assists' => $boxScore['totals']['assists'] ?? null,
                'pFouls' => $boxScore['totals']['pFouls'] ?? null,
                'steals' => $boxScore['totals']['steals'] ?? null,
                'turnovers' => $boxScore['totals']['turnovers'] ?? null,
                'blocks' => $boxScore['totals']['blocks'] ?? null,
                'plusMinus' => $boxScore['totals']['plusMinus'] ?? null,
                'min' => $boxScore['totals']['min'] ?? null,
                'team_fouls' => $boxScore['totals']['team_fouls'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ];
            DB::table('games_boxscore')->insert($boxScore);
        });
    }

    private function createGameLeader($leader, $gameId, $gameDate, $teamId)
    {
        $result = DB::transaction(function () use ($leader, $gameId, $gameDate, $teamId) {
            $leader = [
                'gameId' => $gameId,
                'date' => $gameDate,
                'teamId' => $teamId,
                'points' => $leader['points']['value'] ?? null,
                'pPersonId' => $leader['points']['players'][0]['personId'] ?? null,
                'pFirstName' => $leader['points']['players'][0]['firstName'] ?? null,
                'pLastName' => $leader['points']['players'][0]['lastName'] ?? null,
                'rebounds' => $leader['rebounds']['value'] ?? null,
                'rPersonId' => $leader['rebounds']['players'][0]['personId'] ?? null,
                'rFirstName' => $leader['rebounds']['players'][0]['firstName'] ?? null,
                'rLastName' => $leader['rebounds']['players'][0]['lastName'] ?? null,
                'assists' => $leader['assists']['value'] ?? null,
                'aPersonId' => $leader['assists']['players'][0]['personId'] ?? null,
                'aFirstName' => $leader['assists']['players'][0]['firstName'] ?? null,
                'aLastName' => $leader['assists']['players'][0]['lastName'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('games_leaders')->insert($leader);
        });
    }

    private function createPlayerBoxscore($playerBoxscore, $gameId, $gameDate)
    {
        $result = DB::transaction(function () use ($playerBoxscore, $gameId, $gameDate) {
            $playerBoxscore = [
                'gameId' => $gameId,
                'date' => $gameDate,
                'teamId' => $playerBoxscore['teamId'] ?? null,
                'personId' => $playerBoxscore['personId'] ?? null,
                'firstName' => $playerBoxscore['firstName'] ?? null,
                'lastName' => $playerBoxscore['lastName'] ?? null,
                'jersey' => $playerBoxscore['jersey'] ?? null,
                'pos' => $playerBoxscore['pos'] ?? null,
                'points' => $playerBoxscore['points'] != '' ? $playerBoxscore['points'] ?? null : null ?? null,
                'min' => $playerBoxscore['min'] != '' ? $playerBoxscore['min'] ?? null : null ?? null,
                'fgm' => $playerBoxscore['fgm'] != '' ? $playerBoxscore['fgm'] ?? null : null ?? null,
                'fga' => $playerBoxscore['fga'] != '' ? $playerBoxscore['fga'] ?? null : null ?? null,
                'fgp' => $playerBoxscore['fgp'] != '' ? $playerBoxscore['fgp'] ?? null : null ?? null,
                'ftm' => $playerBoxscore['ftm'] != '' ? $playerBoxscore['ftm'] ?? null : null ?? null,
                'fta' => $playerBoxscore['fta'] != '' ? $playerBoxscore['fta'] ?? null : null ?? null,
                'ftp' => $playerBoxscore['ftp'] != '' ? $playerBoxscore['ftp'] ?? null : null ?? null,
                'tpm' => $playerBoxscore['tpm'] != '' ? $playerBoxscore['tpm'] ?? null : null ?? null,
                'tpa' => $playerBoxscore['tpa'] != '' ? $playerBoxscore['tpa'] ?? null : null ?? null,
                'tpp' => $playerBoxscore['tpp'] != '' ? $playerBoxscore['tpp'] ?? null : null ?? null,
                'offReb' => $playerBoxscore['offReb'] != '' ? $playerBoxscore['offReb'] ?? null : null ?? null,
                'defReb' => $playerBoxscore['defReb'] != '' ? $playerBoxscore['defReb'] ?? null : null ?? null,
                'totReb' => $playerBoxscore['totReb'] != '' ? $playerBoxscore['totReb'] ?? null : null ?? null,
                'assists' => $playerBoxscore['assists'] != '' ? $playerBoxscore['assists'] ?? null : null ?? null,
                'pFouls' => $playerBoxscore['pFouls'] != '' ? $playerBoxscore['pFouls'] ?? null : null ?? null,
                'steals' => $playerBoxscore['steals'] != '' ? $playerBoxscore['steals'] ?? null : null ?? null,
                'turnovers' => $playerBoxscore['turnovers'] != '' ? $playerBoxscore['turnovers'] ?? null : null ?? null,
                'blocks' => $playerBoxscore['blocks'] != '' ? $playerBoxscore['blocks'] ?? null : null ?? null,
                'plusMinus' => $playerBoxscore['plusMinus'] != '' ? $playerBoxscore['plusMinus'] ?? null : null ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('games_players_boxscore')->insert($playerBoxscore);
        });
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->loadBoxscores();
        return 0;
    }
}
