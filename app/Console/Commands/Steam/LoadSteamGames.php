<?php

namespace App\Console\Commands\Steam;

use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Helper\ProgressBar;

class LoadSteamGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'steam:load-games {steep=load}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load steam games';


    private Factory $httpClient;

    private string $temporaryGamesList = './storage/app/steam';

    private array $genres = [];
    private array $publishers = [];
    private array $developers = [];
    private array $gamesDeleted = [];
    private int $countGamesToDeleted = 0;
    private int $counGamesToAdd = 0;

    public function __construct(Factory $httpClient)
    {
        parent::__construct();
        $this->httpClient = $httpClient;
    }

    private function loadGameList(): void
    {
        $steamAllGamesUrl = config('steam.api.games.all');
        $response = $this->httpClient->get($steamAllGamesUrl);

        if ($response->failed()) {
            $this->error('Request failed. Status code: ' . $response->status());
            exit;
        }

        $responseContent = $response->json();
        $apps = $responseContent['applist']['apps'];
        //dd($apps);
        $jsonApps = json_encode($apps);
        $res = file_put_contents($this->temporaryGamesList, $jsonApps);
        $this->info('LOADED!!!');
    }

    private function setGameList(): void
    {
        $gameList = file_get_contents($this->temporaryGamesList);
        $gameList = json_decode($gameList, true);
        $gameList = Arr::pluck($gameList, 'appid');
        $gameList = array_flip($gameList);

        $savedGames = DB::table('games')
            ->select('steam_appid')
            ->pluck('steam_appid')  //spłaszczanie tablicy
            ->toArray(); //konwertujemy wynik do tablicy

        //usuwanie gier, którye są w bazie ale nie ma już na steamie
        foreach ($savedGames as $game) {
            if (!array_key_exists($game, $gameList)) {
                $this->countGamesToDeleted += 1;
                $result = array_push($this->gamesDeleted, $game);
            }
        }
        $this->info("Games to deleted: $this->countGamesToDeleted");

        if ($this->countGamesToDeleted) {
            $this->deleteGame($this->gamesDeleted);
        } else {
            $this->info("Adding new games");
        }


        //dodawanie nowych gier, które pojawiły się na steamie, ale nie ma w bazie
        //obracanie tablic
        $gameList = array_flip($gameList);
        $savedGames = array_flip($savedGames);

        $genres = DB::table('genres')
            ->select()
            ->get()
            ->toArray();
        foreach ($genres ?? [] as $row) {
            $this->genres[$row->id] = (array) $row;
        }

        foreach ($gameList as $steamGame) {
            if (!array_key_exists($steamGame, $savedGames)) {
                $this->counGamesToAdd += 1;
            }
        }

        $this->info("Games to add $this->counGamesToAdd");

        $progressAddSteamGames = $this->output->createProgressBar($this->counGamesToAdd);

        foreach ($gameList as $steamGame) {
            if (!array_key_exists($steamGame, $savedGames)) {
                $this->tryLoadGame = 0;
                sleep(1);
                $data = $this->getSteamGame($steamGame);
                //$data = $data[$steamGame];
                //$data = array_shift($data);
                //dd($data);
                if ($data['success'] === false) {
                    $this->error("ERROR: Game: $steamGame Data is empty");
                    continue;
                }
                if (!empty($data)) {
                    try {
                        $this->create($data);
                    } catch (\Throwable $e) {
                        dump($data);
                        dump($e);
                        continue;
                    }
                }
                $progressAddSteamGames->advance();
                $this->info(" - Game steam id: $steamGame added successful");
            }
        }
    }

    private function deleteGame($gamesToDelete)
    {
        DB::table('games')->whereIn('steam_appid', $gamesToDelete)->delete();
        $this->info("Games deleted successful");
    }

    //pobieranie informacji o danej grze
    private function getSteamGame($appId)
    {
        $steamGameDetailsUrl = config('steam.api.games.details');
        $response = $this->httpClient->get(
            $steamGameDetailsUrl,
            [
                'appids' => $appId,
                'l' => 'en'
            ]
        );

        if ($response->failed()) {
            $this->error("ERROR: Game: $appId HTTP Code {$response->status()}");
        }

        if (!empty($response)) {
            $data = $response->json();
            $data = array_shift($data);
        }
        return $data;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //linki do dostępności api steam'a
        // https://partner.steamgames.com/doc/webapi_overview
        // https://partner.steamgames.com/doc/webapi/ISteamApps#GetAppList
        // https://store.steampowered.com/api/appdetails?appids=1095320
        // https://wiki.teamfortress.com/wiki/User:RJackson/StorefrontAPI#appdetails

        //pobieranie informacji o kroku (step)
        $steep = $this->argument('steep');
        if ($steep == 'load') {
            $this->info('Loading Games from steam');
            $this->loadGameList();
            return 0;
        } elseif ($steep == 'update') {
            $this->info('Configuration table with games');
            $this->setGameList();
            return 0;
        }


        $gameList = file_get_contents($this->temporaryGamesList);
        //dd($gameList);
        $gameList = json_decode($gameList, true);
        //dd($gameList);

        $savedGames = DB::table('games')
            ->select('steam_appid')
            ->pluck('steam_appid')  //spłaszczanie tablicy
            ->toArray(); //konwertujemy wynik do tablicy
        $savedGames = array_flip($savedGames); //przetasowanie

        // dd($savedGames);exit;

        $genres = DB::table('genres')
            ->select()
            ->get()
            ->toArray();
        foreach ($genres ?? [] as $row) {
            $this->genres[$row->id] = (array) $row;
        }

        //dd($genres);

        //$gameList maksymalna liczba elementó które ma progrressbat uzupełnić
        $progressDb = $this->output->createProgressBar(count($gameList));


        foreach ($gameList as $row) {
            // {"appid":216938,"name":"Pieterw"}
            $appId = $row['appid'];
            // dd($row);
            if (array_key_exists($appId, $savedGames)) {
                $progressDb->advance(); //zwiększenie progressbara o 1
                $this->info(' - ' . $appId);
                continue;
            }

            //sleep dodany ze względu na ograniczenie requestów na setamie (100000 na dzień)
            // dzięi temu sukcesywnie pobiera nowe dane i wolniej osiąga limit
            sleep(1); //usypianie skryptu na sekunde

            //pobieranie informacji o danej grze

            $data = $this->getSteamGame($appId);

            try {
                $this->create($data);
            } catch (\Throwable $e) {
                dump($data);
                dump($e);
                continue;
            }

            $progressDb->advance();
            $this->info(" - " . $appId . ": " . $data[$appId]['data']['name']);
        }

        $progressDb->finish();

        $this->info('End from DB');

        return 0;
    }

    private function create($data)
    {
        //jeżeli gdzieś wystąpi błąd to automatycznie wszystkie dane odnośnie danej tranzakcji nie zostaną zapisane
        //zwykły system transakcji bazodanowej, dzięki linii poniżej możemy tego fuetera użyć
        $result = DB::transaction(function () use ($data) {

            // $data = array_shift($data);
            if ($data['success'] !== true) {
                return;
            }

            $data = $data['data'];
            //dd($data);
            $game = [
                'steam_appid' => $data['steam_appid'],
                'relation_id' => !empty($data['fullgame']) ? (int) $data['fullgame']['appid'] : null,
                'name' => $data['name'],
                'type' => $data['type'],

                'description' => $data['detailed_description'],
                'short_description' => $data['short_description'],
                'about' => $data['about_the_game'],
                'image' => $data['header_image'],
                'website' => $data['website'],

                'price_amount' => $data['price_overview']['initial'] ?? null,
                'price_currency' => $data['price_overview']['currency'] ?? null,

                'metacritic_score' => $data['metacritic']['score'] ?? null,
                'metacritic_url' => $data['metacritic']['url'] ?? null,
                'release_date' => $data['release_date']['date'],
                'languages' => $data['supported_languages'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $gameId = DB::table('games')->insertGetId($game);

            foreach ($data['genres'] ?? [] as $genre) {
                if (empty($this->genres[$genre['id']])) { //jeśli nie istnieje dany gatunek w systemie
                    $genreData = [
                        'id' => $genre['id'],
                        'name' => $genre['description'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];
                    $result = DB::table('genres')->insert($genreData);
                    $this->genres[$genreData['id']] = $genreData;
                }

                DB::table('gameGenres')->insert([
                    'game_id' => $gameId,
                    'genre_id' => $genre['id']
                ]);
            }

            foreach ($data['publishers'] ?? [] as $publisher) {
                if (empty($this->publishers[$publisher])) {
                    $publisherData = [
                        'name' => $publisher,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];
                    $publisherId = DB::table('publishers')->insertGetId($publisherData);
                    $publisherData['id'] = $publisherId;
                    $this->publishers[$publisher] = $publisherData;
                }

                $publisherId = $this->publishers[$publisher]['id'];

                DB::table('gamePublishers')->insert([
                    'game_id' => $gameId,
                    'publisher_id' => $publisherId
                ]);
            }

            foreach ($data['developers'] ?? [] as $developer) {
                if (empty($this->developers[$developer])) {
                    $developerData = [
                        'name' => $developer,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];
                    $developerId = DB::table('developers')->insertGetId($developerData);
                    $developerData['id'] = $developerId;
                    $this->developers[$developer] = $developerData;
                }

                $developerId = $this->developers[$developer]['id'];

                DB::table('gameDevelopers')->insert([
                    'game_id' => $gameId,
                    'developer_id' => $developerId
                ]);
            }

            foreach ($data['screenshots'] ?? [] as $screenshot) {
                DB::table('screenshots')->insert([
                    'game_id' => $gameId,
                    'thumbnail' => $screenshot['path_thumbnail'],
                    'url' => $screenshot['path_full'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            foreach ($data['movies'] ?? [] as $movie) {
                DB::table('movies')->insertOrIgnore([
                    'game_id' => $gameId,
                    'original_id' => $movie['id'],
                    'name' => $movie['name'],
                    'highlight' => $movie['highlight'],
                    'thumbnail' => $movie['thumbnail'],
                    'webm_480' => $movie['webm']['480'],
                    'webm_url' => $movie['webm']['max'],
                    'mp4_480' => $movie['mp4']['480'],
                    'mp4_url' => $movie['mp4']['max'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        });
    }
}
