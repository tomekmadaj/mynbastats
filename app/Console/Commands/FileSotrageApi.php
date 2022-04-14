<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FileSotrageApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:api-example {example}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $command = $this->argument('example');

        switch($command) {
            case 'create':
                //przykłady zapisu plików
                //utworzeni pliku publicznego
                //Storage::disk('public')->put('files/example.txt', 'new2 kontent pliku');
                //samo put, bez wcześniej disk tworzy plik na domyślnymm dysku
                Storage::put('file.txt', 'kontent pliku na domyślnym dysku');
                //tworzy na dysku pliku z zawartośćią 'kontent pliku'
                //jęsli plik istnieje kontent zostanie zaktualizowany
                //Storage::disk('local')->put('file.txt', 'kontent pliku');
                break;
            case 'read':
                //odczyt danych  (możemy pominąć nazwę dysku i system weźmie domyślny)
                //$content = Storage::disk('local')->get('file.txt');
                $content = Storage::get('file.txt');
                $this->info($content);
                break;
            case 'exist':
                //sprawdzenie czy plik istnieje bądź nie 
                $exists = Storage::exists('file.txt');
                $missing = Storage::missing('file.txt');
                $this->info("EXISTS: $exists");
                $this->info('MISSING: ' . ((int) $missing));
                break;
            case 'download':
                //ściągnięcie plików 
                $name = 'nameForDownload.txt';
                //zwracanie kontentu pliku
                //return Storage::download('file.txt');
                //zwracanie kontenu pliku z nazwą którą nadajemy w drugim parametrze
                return Storage::download('file.txt', $name);
                break;
            case 'localization':
                //pobranie lokalizacji pliku z dysku publicznego (pełna domena-)
                //nazwa domeny pobierana z config\app.php 'url' => env('APP_URL', 'http://localhost'),
                //monza jąnadpisać w .env 'APP_URL
                $url = Storage::disk('public')->url('files/example.txt');
                //pobranie lokalizacji pliku z dysku publicznego (ścieżka pliku)
                //$url = Storage::url('file.txt');
                $path = Storage::path('file.txt');
                $this->info("URL: $url");
                $this->info("PATH: $path");
                break;
            case 'relocation':
                //kopiujemy, albo przenosimy
                //Storage::copy('file.txt', 'new_file.txt');
                Storage::move('new_file.txt', 'moved_file.txt');
                break;
            case 'delete':
                Storage::delete('moved_file.txt');
                //przekazanie, więcej niż jeden plik do usunięcia
                //Storage::delete(['moved_file.txt', 'file1.txt']);
                break;
            case 'dirOperation':
                //operacje na folderach
                $directory = 'testDir';
                //utworzenie folderu
                //Storage::makeDirectory($directory);
                Storage::deleteDirectory($directory);
                break;
        }

        $this->info('OK');
        return 0;
    }
}
