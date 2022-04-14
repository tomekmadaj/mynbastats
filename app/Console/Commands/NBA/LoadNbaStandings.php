<?php

namespace App\Console\Commands\NBA;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadNbaStandings extends Command
{
    private Factory $httpClient;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-standings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'load NBA teams standings';

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

    private function LoadNbaStandings()
    {
        $nbaStandingsUrl = config('nba.api.standings');

        $response = $this->httpClient->get($nbaStandingsUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
        }

        $responseJson = $response->json();
        $nbaStandings = $response['league']['standard']['conference'];

        $this->info('Loading NBA Standings');
        $this->newLine();

        DB::table('standings')->truncate();

        //wczytywanie konferencji wschodzniej
        foreach ($nbaStandings['east'] as $eastStanding) {
            if (!empty($eastStanding['teamId'])) {
                try {
                    $this->create($eastStanding, 'east');
                } catch (\Throwable $e) {
                    dump($eastStanding);
                    dump($e);
                    continue;
                }
            }
        }
        $this->info('East standings Load succesfull');
        $this->newLine();

        //wczytywanie konferencji zachodniej
        foreach ($nbaStandings['west'] as $eastStanding) {
            if (!empty($eastStanding['teamId'])) {
                try {
                    $this->create($eastStanding, 'west');
                } catch (\Throwable $e) {
                    dump($eastStanding);
                    dump($e);
                    continue;
                }
            }
        }
        $this->info('West standings Load succesfull');
    }

    private function create($standingData, $conference)
    {
        $result =  DB::transaction(function () use ($standingData, $conference) {
            $standing = [
                'teamId' => $standingData['teamId'],
                'conference' => $conference,
                'win' => $standingData['win'] ?? null,
                'loss' => $standingData['loss'] ?? null,
                'winPct' => $standingData['winPct'] ?? null,
                'winPctV2' => $standingData['winPctV2'] ?? null,
                'lossPct' => $standingData['lossPct'] ?? null,
                'lossPctV2' => $standingData['lossPctV2'] ?? null,
                'gamesBehind' => $standingData['gamesBehind'] ?? null,
                'divGamesBehind' => $standingData['divGamesBehind'] ?? null,
                'clinchedPlayoffsCode' => $standingData['clinchedPlayoffsCode'] ?? null,
                'clinchedPlayoffsCodeV2' => $standingData['clinchedPlayoffsCodeV2'] ?? null,
                'confRank' => $standingData['confRank'] ?? null,
                'confWin' => $standingData['confWin'] ?? null,
                'confLoss' => $standingData['confLoss'] ?? null,
                'divWin' => $standingData['divWin'] ?? null,
                'divLoss' => $standingData['divLoss'] ?? null,
                'homeWin' => $standingData['homeWin'] ?? null,
                'homeLoss' => $standingData['homeLoss'] ?? null,
                'awayWin' => $standingData['awayWin'] ?? null,
                'awayLoss' => $standingData['awayLoss'] ?? null,
                'lastTenWin' => $standingData['lastTenWin'] ?? null,
                'lastTenLoss' => $standingData['lastTenLoss'] ?? null,
                'streak' => $standingData['streak'] ?? null,
                'divRank' => $standingData['divRank'] ?? null,
                'isWinStreak' => $standingData['isWinStreak'] ?? null
            ];
            DB::table('standings')->insert($standing);
        });
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->LoadNbaStandings();
        return 0;
    }
}
