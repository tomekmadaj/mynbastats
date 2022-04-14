<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadNbaTeams extends Command
{
    private Factory $httpClient;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load NBA Teams';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        parent::__construct();
        $this->httpClient = $httpClient;
    }

    private function loadNbaTeams()
    {
        $nbaAllTeamsUrl = config('nba.api.teams');

        $response = $this->httpClient->get($nbaAllTeamsUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
        }

        $responseJson = $response->json();
        $nbaTeams = $responseJson['league']['standard'];

        foreach ($nbaTeams as $team) {
            if (!empty($team['teamId'])) {
                $this->create($team);
            }
        }
    }

    private function create($teamData)
    {
        $result = DB::transaction(function () use ($teamData) {
            $team = [
                'fullName' => $teamData['fullName'] ?? null,
                'city' => $teamData['city'] ?? null,
                'confName' => $teamData['confName'] ?? null,
                'isNBAFranchise' => $teamData['isNBAFranchise'] ?? null,
                'divName' => $teamData['divName'] ?? null,
                'isAllStar' => $teamData['isAllStar'] ?? null,
                'tricode' => $teamData['tricode'] ?? null,
                'teamShortName' => $teamData['teamShortName'] ?? null,
                'teamId' => $teamData['teamId'] ?? null,
                'altCityName' => $teamData['altCityName'] ?? null,
                'nickname' => $teamData['nickname'] ?? null,
                'urlName' => $teamData['urlName'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            DB::table('teams')->insert($team);
        });

        $this->info('Team: ' . $teamData['fullName'] . ' has been added succesfully');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Loading NBA Teams');
        $this->loadNbaTeams();
        return 0;
    }
}
