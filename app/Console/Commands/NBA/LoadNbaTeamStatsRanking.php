<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadNbaTeamStatsRanking extends Command
{
    private Factory $httpClient;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-teams-stats-ranking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load NBA team stats ranking';

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

    private function loadNbaStatsRanking()
    {
        $nbaStatsRankingUrl = config('nba.api.teamStatsRanking');

        $response = $this->httpClient->get($nbaStatsRankingUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
            $this->newLine();
            return;
        }

        $responseContent = $response->json();
        $statsRankingData = $responseContent['league']['standard']['regularSeason'];

        // dd($statsRankingData);

        DB::table('teams_stats_rankings')->truncate();

        foreach ($statsRankingData['teams'] as $teamData) {
            if (!empty($teamData['teamId'])) {
                $teamId = $teamData['teamId'];
                $this->create($teamData);
                $this->info("Team $teamId loaded succesfull");
                $this->newLine();
            }
        }
    }

    private function create($teamData)
    {
        $result = DB::transaction(function () use ($teamData) {
            $teamStatsRankingData = [
                'teamId' => $teamData['teamId'],
                'name' => $teamData['name'] ?? null,
                'teamcode' => $teamData['teamcode'] ?? null,
                'abbreviation' => $teamData['abbreviation'] ?? null,
                'min_avg' => $teamData['min']['avg'] ?? null,
                'min_rank' => $teamData['min']['rank'] ?? null,
                'fgp_avg' => $teamData['fgp']['avg'] ?? null,
                'fgp_rank' => $teamData['fgp']['rank'] ?? null,
                'tpp_avg' => $teamData['tpp']['avg'] ?? null,
                'tpp_rank' => $teamData['tpp']['rank'] ?? null,
                'ftp_avg' => $teamData['ftp']['avg'] ?? null,
                'ftp_rank' => $teamData['ftp']['rank'] ?? null,
                'orpg_avg' => $teamData['orpg']['avg'] ?? null,
                'orpg_rank' => $teamData['orpg']['rank'] ?? null,
                'drpg_avg' => $teamData['drpg']['avg'] ?? null,
                'drpg_rank' => $teamData['drpg']['rank'] ?? null,
                'trpg_avg' => $teamData['trpg']['avg'] ?? null,
                'trpg_rank' => $teamData['trpg']['rank'] ?? null,
                'apg_avg' => $teamData['apg']['avg'] ?? null,
                'apg_rank' => $teamData['apg']['rank'] ?? null,
                'tpg_avg' => $teamData['tpg']['avg'] ?? null,
                'tpg_rank' => $teamData['tpg']['rank'] ?? null,
                'spg_avg' => $teamData['spg']['avg'] ?? null,
                'spg_rank' => $teamData['spg']['rank'] ?? null,
                'bpg_avg' => $teamData['bpg']['avg'] ?? null,
                'bpg_rank' => $teamData['bpg']['rank'] ?? null,
                'pfpg_avg' => $teamData['pfpg']['avg'] ?? null,
                'pfpg_rank' => $teamData['pfpg']['rank'] ?? null,
                'ppg_avg' => $teamData['ppg']['avg'] ?? null,
                'ppg_rank' => $teamData['ppg']['rank'] ?? null,
                'oppg_avg' => $teamData['oppg']['avg'] ?? null,
                'oppg_rank' => $teamData['oppg']['rank'] ?? null,
                'eff_avg' => $teamData['eff']['avg'] ?? null,
                'eff_rank' => $teamData['eff']['rank'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            DB::table('teams_stats_rankings')->insert($teamStatsRankingData);
        });
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Loading NBA teams stats ranking');
        $this->newLine();
        $this->loadNbaStatsRanking();

        return 0;
    }
}
