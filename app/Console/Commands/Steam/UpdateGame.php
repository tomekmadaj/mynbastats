<?php

namespace App\Console\Commands\Steam;

use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;

class UpdateGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'steam:update-game {game}';

    //ustawienie argumentu jako opcjonalnego
    // protected $signature = 'steam:update-game {game?}';

    //argumentz wartością domyślną
    // protected $signature = 'steam:update-game {game=FIFA}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Steam - update game';

    protected Factory $httpClient;

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

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle(Factory $httpClient) 
    {   
        // użycie fasady
        // $resonse = Http::get('https://postman-echo.com/get', [
        //     'foo' => 'bar',
        // ]);

        $response = $this->httpClient->get('https://postman-echo.com/get', [
            'foo' => 'bar',
        ]);

        // if ($response->failed()) {
        //     $this->error('error!!!');
        // }

        //dump($response);
        return 0;
    }

    public function handleTest()
    {
       $game = $this->argument('game');
        dump($game);

       $answer = $this->ask('Czy to Twoja gra?');

       $result = $this->confirm('Czy na pewno zaktualizować grę');
       $this->error('error'); //czerowny kolor

      $this->question('question'); //niebieski
      
    return 0;
    }
}
