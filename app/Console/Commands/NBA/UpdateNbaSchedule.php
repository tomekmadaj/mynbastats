<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Log;

class UpdateNbaSchedule extends Command
{
    private Factory $httpClient;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:update-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update current NBA schedule';

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

    public function updateNbaSchedul()
    {
        $nbaScheduleUrl = config('nba.api.schedule');

        $response = $this->httpClient->get($nbaScheduleUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
        }

        $responseJson = $response->json();
        $schedule = $responseJson['league']['standard'];

        $this->info('Loading NBA Schedule');
        Log::channel('schedule')->info('Loading NBA Schedule');

        $currentSchedule = array_column($this->loadCurrentSchedule()->toArray(), 'gameId');
        foreach ($schedule as $game) {
            if (!in_array($game['gameId'], $currentSchedule)) {
                try {
                    $this->create($game);
                    Log::channel('schedule')->info("Game: " . $game['gameId'] . " - create succesfull");
                } catch (\Throwable $e) {
                    dump($game);
                    dump($e);
                    Log::channel('schedule')->emergency($game);
                    Log::channel('schedule')->emergency($e);
                    continue;
                }
            }
        }
        $currentSchedule = $this->loadCurrentSchedule();
        $NewSchedule = array_column($schedule, 'gameId');
        foreach ($currentSchedule as $game) {
            if (!in_array($game->gameId, $NewSchedule)) {
                try {
                    $this->delete($game->gameId);
                    Log::channel('schedule')->info("Game: " . $game->gameId . " - delete succesfull");
                } catch (\Throwable $e) {
                    dump($game);
                    dump($e);
                    Log::channel('schedule')->emergency($game);
                    Log::channel('schedule')->emergency($e);
                    continue;
                }
            }
        }

        $gamesToUpdate = $this->loadEmptyGames()->toArray();
        $scheduleToUpdate = array_slice($schedule, -count($gamesToUpdate));

        foreach ($scheduleToUpdate as $game) {
            if (!empty($game['gameId'])) {
                try {
                    $this->update($game);
                    Log::channel('schedule')->info("Game: " . $game['gameId'] . " - update succesfull");
                } catch (\Throwable $e) {
                    dump($game);
                    dump($e);
                    Log::channel('schedule')->emergency($game);
                    Log::channel('schedule')->emergency($e);
                    continue;
                }
            }
        }
        $this->info('NBA Schedule load succesfull');
        Log::channel('schedule')->info('NBA Schedule load succesfull');
    }

    private function loadEmptyGames()
    {
        $schedule = DB::table('schedule')->whereNull(['hTeamScore', 'vTeamScore'])->get();

        return $schedule;
    }

    private function loadCurrentSchedule()
    {
        $currentSchedule = DB::table('schedule')->get();

        return $currentSchedule;
    }

    private function create($gameData)
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

    private function delete($gameId)
    {
        $result = DB::transaction(function () use ($gameId) {
            DB::table('schedule')->where('gameId', $gameId)->delete();
        });
    }

    private function update($gameData)
    {
        $result = DB::transaction(function () use ($gameData) {
            $gameSchedule = [
                'date' => $gameData['startDateEastern'],
                'gameUrlCode' => $gameData['gameUrlCode'] ?? null,
                'startTimeEastern' => $gameData['startTimeEastern'] ?? null,
                'hTeamId' => $gameData['hTeam']['teamId'] ?? null,
                'hTeamScore' => $gameData['hTeam']['score'] != '' ? $gameData['hTeam']['score'] ?? null : null,
                'vTeamId' => $gameData['vTeam']['teamId'] ?? null,
                'vTeamScore' => $gameData['vTeam']['score'] != '' ? $gameData['vTeam']['score'] ?? null : null,
                'updated_at' => Carbon::now()
            ];
            DB::table('schedule')->where('gameId', $gameData['gameId'])->update($gameSchedule);
        });
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->updateNbaSchedul();
        return 0;
    }
}
