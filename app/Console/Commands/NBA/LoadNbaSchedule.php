<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadNbaSchedule extends Command
{
    private Factory $httpClient;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load current Nba schedule';

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

    public function loadNbaSchedule()
    {
        $nbaScheduleUrl = config('nba.api.schedule');

        $response = $this->httpClient->get($nbaScheduleUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
        }

        $responseJson = $response->json();
        $schedule = $responseJson['league']['standard'];

        $this->info('Loading NBA Schedule');

        $preogressBar = $this->output->createProgressBar(count($schedule));

        // DB::table('schedule')->truncate();

        foreach ($schedule as $game) {
            if (!empty($game['gameId'])) {
                try {
                    $this->create($game);
                } catch (\Throwable $e) {
                    dump($game);
                    dump($e);
                    continue;
                }
            }
            $preogressBar->advance();
        }
        $preogressBar->finish();
        $this->newLine();
        $this->info('NBA Schedule load succesfull');
    }

    public function create($gameData)
    {
        $result = DB::transaction(function () use ($gameData) {
            $gameSchedule = [
                'gameId' => $gameData['gameId'],
                'date' => $gameData['startDateEastern'],
                'gameUrlCode' => $gameData['gameUrlCode'] ?? null,
                'startTimeEastern' => $gameData['startTimeEastern'] ?? null,
                'hTeamId' => $gameData['hTeam']['teamId'] ?? null,
                'hTeamScore' => $gameData['hTeam']['score'] != '' ? $gameData['hTeam']['score'] ?? null : null,
                'vTeamId' => $gameData['vTeam']['teamId'] ?? null,
                'vTeamScore' => $gameData['vTeam']['score'] != '' ? $gameData['vTeam']['score'] ?? null : null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('schedule')->insert($gameSchedule);
        });
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->loadNbaSchedule();
        return 0;
    }
}
