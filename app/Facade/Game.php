<?php 

declare(strict_types=1);

namespace App\Facade;

use App\Repository\GameRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class Game extends Facade 
{
    public static function getFacadeAccessor() 
    {
        //string pod którą kryje się pełna ścieżka nazwy klasy
        //który jest automatycznie kluczem w kontenerze
        //nadany przez nas klucz ręcznie możemy umieści w kontenerze - service providerze
        return GameRepositoryInterface::class;
        'game';
    }
}