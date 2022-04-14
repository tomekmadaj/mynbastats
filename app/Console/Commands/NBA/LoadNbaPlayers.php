<?php

namespace App\Console\Commands\NBA;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Factory;

class LoadNbaPlayers extends Command
{
    private Factory $httpClient;
    private $countPlayersToAdd = 0;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nba:load-players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load NBA Players';


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

    private function LoadNbaPlayers()
    {
        $NbaAllPlayersUrl = config('nba.api.players');

        $response = $this->httpClient->get($NbaAllPlayersUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status Code: ' . $response->status());
        }

        $responseJson = $response->json();
        $nbaPlayers = $responseJson['league']['standard'];

        foreach($nbaPlayers as $player) {
            $this->countPlayersToAdd ++;
        }

        $this->info('Loading ' . $this->countPlayersToAdd . ' NBA Players');

       // $progrssDb = $this->output->createProgressBar($this->countPlayersToAdd);
        $this->newLine();

        foreach($nbaPlayers as $player) {
            if(!empty($player['personId'])) {
                try {
                    $this->create($player);
                } catch (\Throwable $e) {
                    dump($player);
                    dump($e);
                    continue;
                }

            }
         //   sleep(1);
         //   $progrssDb->advance();
            $this->newLine();
        }

       // $progrssDb->finish();
        $this->info('Players load succesfully');
    }



    private function create($playerData)
    {
        $result = DB::transaction(function () use ($playerData) {
            $player = [
                'personId' => $playerData['personId'],
                'teamId' => $playerData['teamId'],
                'firstName' => $playerData['firstName'] ?? null,
                'lastName' => $playerData['lastName'] ?? null,
                'temporaryDisplayName' => $playerData['temporaryDisplayName'] ?? null,
                'jersey' => $playerData['jersey'] ?? null,
                'isActive' => $playerData['isActive'] ?? null,
                'pos' => $playerData['pos'] ?? null,
                'heightFeet' => $playerData['heightFeet'] != '-' ? $playerData['heightFeet'] ?? null : null ,
                'heightInches' => $playerData['heightInches'] != '-' ? $playerData['heightInches'] ?? null : null,
                'heightMeters' => $playerData['heightMeters'] != '' ? $playerData['heightMeters'] ?? null : null,
                'weightPounds' => $playerData['weightPounds'] != '' ? $playerData['weightPounds'] ?? null : null,
                'weightKilograms' => $playerData['weightKilograms'] != '' ? $playerData['weightKilograms'] ?? null : null,
                'dateOfBirthUTC' => $playerData['dateOfBirthUTC'] != '' ? $playerData['dateOfBirthUTC'] : null,
                'nbaDebutYear' => $playerData['nbaDebutYear'] ?? null,
                'yearsPro' => $playerData['yearsPro'] != '' ? $playerData['yearsPro'] : null,
                'collegeName' => $playerData['collegeName'] ?? null,
                'lastAffiliation' => $playerData['lastAffiliation'] ?? null,
                'country' => $playerData['country'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('players')->insert($player);
        });

        $this->info('Player: ' . $playerData['firstName'] . $playerData['lastName'] .' has been added succesfully');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->LoadNbaPlayers();
        return 0;
    }
}
