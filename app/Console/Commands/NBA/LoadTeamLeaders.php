<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadTeamLeaders extends Command
{
    private Factory $httpClient;
    private $nbaTeamLeadersUrl;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-team-leaders {teamId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load NBA Team Leaders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->nbaTeamLeadersUrl = config('nba.api.teamLeaders');
        parent::__construct();
    }

    private function getNbaTeams()
    {
        $nbaTeams = DB::table('teams')->select('teamId')->pluck('teamId')->toArray();
        return $nbaTeams;
    }

    private function loadAllNbaTeamsLeaders()
    {
        $nbaTeams = $this->getNbaTeams();

        foreach ($nbaTeams as $teamId) {
            $this->loadNbaTeamLeaders($teamId);
        }
    }

    private function loadNbaTeamLeaders($teamId)
    {
        $teamLeadersUrl = str_replace('{{teamId}}', "$teamId", $this->nbaTeamLeadersUrl);

        $response = $this->httpClient->get($teamLeadersUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
            $this->newLine();
            return;
        } else {
            $this->info("Response for team $teamId data - OK");
        }

        $responseContent = $response->json();
        $teamLeadersData = $responseContent['league']['standard'];


        // $test = array_shift($teamLeadersData['ppg'])['value'];
        // var_dump($test);

        // dd($test);

        $this->info("Loading NBA team leaders - $teamId");

        $this->info("Delete old team leaders $teamId data");
        DB::table('team_leaders')->where('teamId', '=', $teamId)->delete();

        try {
            $this->create($teamId, $teamLeadersData);
            $this->info("Team Leaders: $teamId load succesfull");
            $this->newLine();
        } catch (\Throwable $e) {
            dump($teamLeadersData);
            dump($e);
        }
    }

    private function create($teamId, $teamLeadersData)
    {
        // $ppg = array_column($teamLeadersData['ppg'], 'value');
        // $ppg = array_shift($ppg);
        // $ppg = floatval($ppg);

        // dd($ppg);

        // // var_dump($ppg);
        // // dd($ppg);

        // $ppgPersonId = array_column($teamLeadersData['ppg'], 'personId');
        // $ppgPersonId = array_shift($ppgPersonId);

        // $ppgPersonId = floatval($ppgPersonId);

        // $ppg = array_shift($teamLeadersData['ppg'])['value'];
        //$ppgPersonId = array_shift($teamLeadersData['ppg'])['personId'];

        // $ppg = $teamLeadersData['ppg'][0]['value'];
        // dd($ppg);



        $result = DB::transaction(function () use ($teamId, $teamLeadersData) {
            $stats = [
                'teamId' =>  $teamId,
                'ppg' => $teamLeadersData['ppg'][0]['value'] ?? null,
                'ppg_personId' => $teamLeadersData['ppg'][0]['personId'] ?? null,
                'trpg' => $teamLeadersData['trpg'][0]['value'] ?? null,
                'trpg_personId' => $teamLeadersData['trpg'][0]['personId'] ?? null,
                'apg' => $teamLeadersData['apg'][0]['value'] ?? null,
                'apg_personId' => $teamLeadersData['apg'][0]['personId'] ?? null,
                'fgp' => $teamLeadersData['fgp'][0]['value'] ?? null,
                'fgp_personId' => $teamLeadersData['fgp'][0]['personId'] ?? null,
                'tpp' => $teamLeadersData['tpp'][0]['value'] ?? null,
                'tpp_personId' => $teamLeadersData['tpp'][0]['personId'] ?? null,
                'ftp' => $teamLeadersData['ftp'][0]['value'] ?? null,
                'ftp_personId' => $teamLeadersData['ftp'][0]['personId'] ?? null,
                'bpg' => $teamLeadersData['bpg'][0]['value'] ?? null,
                'bpg_personId' => $teamLeadersData['bpg'][0]['personId'] ?? null,
                'spg' => $teamLeadersData['spg'][0]['value'] ?? null,
                'spg_personId' => $teamLeadersData['spg'][0]['personId'] ?? null,
                'tpg' => $teamLeadersData['tpg'][0]['value'] ?? null,
                'tpg_personId' => $teamLeadersData['tpg'][0]['personId'] ?? null,
                'pfpg' => $teamLeadersData['pfpg'][0]['value'] ?? null,
                'pfpg_personId' => $teamLeadersData['pfpg'][0]['personId'] ?? null,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('team_leaders')->insert($stats);
        });
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->argument('teamId')) {
            $this->loadNbaTeamLeaders($this->argument('teamId'));
        } else {
            $this->info('Loading all Teams NBA team leaders');
            $this->newLine();
            $this->loadAllNbaTeamsLeaders();
        }
        return 0;
    }
}
