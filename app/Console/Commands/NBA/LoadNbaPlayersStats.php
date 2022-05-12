<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadNbaPlayersStats extends Command
{
    private Factory $httpClient;
    private string $nbaPlayerStatsUrl;
    private array $nbaPlayers;
    private string $currenTeamId;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-players-stats {personId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load NBA Players Stats';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->nbaPlayerStatsUrl = config('nba.api.playerProfile');
        parent::__construct();
    }

    private function getNbaPlayers()
    {
        $this->nbaPlayers = DB::table('players')->select('personId')->pluck('personId')->toArray();
    }

    private function loadAllNbaPlayerStats()
    {
        foreach ($this->nbaPlayers as $personId) {
            $this->loadNbaPlayerStats($personId);
        }
    }

    private function loadNbaPlayerStats($personId)
    {
        $playerDataUrl = str_replace('{{personId}}', "$personId", $this->nbaPlayerStatsUrl);

        $response = $this->httpClient->get($playerDataUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
            $this->newLine();
            return;
        } else {
            $this->info("Response for player $personId data - OK");
        }

        $responseContent = $response->json();
        $playerStats = $responseContent['league']['standard'];

        $this->info("Loading NBA player stats - $personId");

        if ($playerStats['stats']['careerSummary']['gamesPlayed'] == '') {
            $this->error("There is no data for player - $personId");
            $this->newLine();
            return;
        }

        $this->info("Delete player $personId data");
        DB::table('player_stats')->where('personId', '=', $personId)->delete();

        if (!empty($playerStats['teamId'])) {
            try {
                $this->createRegularSeasonStats($playerStats, $personId);
                $this->createCareerSummaryStats($playerStats, $personId);
            } catch (\Throwable $e) {
                dump($playerStats);
                dump($e);
            }
        }
        $this->info("Player $personId load succesfull");
        $this->newLine();
    }

    private function createRegularSeasonStats($playerStatsData, $personId)
    {
        $currentTeamId = $playerStatsData['teamId'];
        $playerStatsData = $playerStatsData['stats']['regularSeason'];

        foreach ($playerStatsData['season'] as $playerSeasonStats) {
            $seasonYear = $playerSeasonStats['seasonYear'];

            $seasonTeamId = $playerSeasonStats['teams'][0]['teamId'];
            $seasonTeamId ?: $seasonTeamId = $currentTeamId;

            $seasonStats = $playerSeasonStats['total'];

            $this->create($seasonStats, $seasonYear, $seasonTeamId,  $personId);
        }
    }

    private function createCareerSummaryStats($playerStatsData,  $personId)
    {
        $currentTeamId = $playerStatsData['teamId'];
        $playerStatsData = $playerStatsData['stats']['careerSummary'];
        $this->create($playerStatsData, 'careerSummary', $currentTeamId,  $personId);
    }

    private function create($playerStatsData, $seasonYear, $teamId,  $personId)
    {
        $result = DB::transaction(function () use ($playerStatsData, $seasonYear, $teamId, $personId) {
            $stats = [
                'personId' =>  $personId,
                'teamId' => $teamId ?? null,
                'seasonYear' => $seasonYear ?? null,
                'ppg' => $playerStatsData['ppg'] ?? null,
                'rpg' => $playerStatsData['rpg'] ?? null,
                'apg' => $playerStatsData['apg'] ?? null,
                'mpg' => $playerStatsData['mpg'] ?? null,
                'topg' => $playerStatsData['topg'] ?? null,
                'spg' => $playerStatsData['spg'] ?? null,
                'bpg' => $playerStatsData['bpg'] ?? null,
                'tpp' => $playerStatsData['tpp'] ?? null,
                'ftp' => $playerStatsData['ftp'] ?? null,
                'fgp' => $playerStatsData['fgp'] ?? null,
                'assists' => $playerStatsData['assists'] ?? null,
                'blocks' => $playerStatsData['blocks'] ?? null,
                'steals' => $playerStatsData['steals'] ?? null,
                'turnovers' => $playerStatsData['turnovers'] ?? null,
                'offReb' => $playerStatsData['offReb'] ?? null,
                'defReb' => $playerStatsData['defReb'] ?? null,
                'totReb' => $playerStatsData['totReb'] ?? null,
                'fgm' => $playerStatsData['fgm'] ?? null,
                'fga' => $playerStatsData['fga'] ?? null,
                'tpm' => $playerStatsData['tpm'] ?? null,
                'tpa' => $playerStatsData['tpa'] ?? null,
                'ftm' => $playerStatsData['ftm'] ?? null,
                'fta' => $playerStatsData['fta'] ?? null,
                'ftm' => $playerStatsData['ftm'] ?? null,
                'pFouls' => $playerStatsData['pFouls'] ?? null,
                'points' => $playerStatsData['points'] ?? null,
                'gamesPlayed' => $playerStatsData['gamesPlayed'] ?? null,
                'gamesStarted' => $playerStatsData['gamesStarted'] ?? null,
                'plusMinus' => $playerStatsData['plusMinus'] ?? null,
                'min' => $playerStatsData['min'] ?? null,
                'dd2' => $playerStatsData['dd2'] ?? null,
                'td3' => $playerStatsData['td3'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('player_stats')->insert($stats);
        });
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->argument('personId')) {
            $this->loadNbaPlayerStats($this->argument('personId'));
        } else {
            $this->info('Loading all NBA players stats');
            $this->newLine();
            $this->getNbaPlayers();
            $this->loadAllNbaPlayerStats();
        }

        return 0;
    }
}
