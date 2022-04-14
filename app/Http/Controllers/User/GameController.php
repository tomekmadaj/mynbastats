<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddGameToUserList;
use App\Http\Requests\RateGame;
use App\Http\Requests\RemoveGameFromUserlist;
use App\Repository\GameRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{

    private GameRepositoryInterface $gameRepository;

    public function __construct(GameRepositoryInterface $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function list()
    {
        $user = Auth::user();

        return view('me.game.list', [
        //pobieranie gier do widoku
        //poprzez games odwołujemy się do relacji i paczkujemy poprzez paginate
            'games' => $user->games()->paginate()
    ]);
    }

    public function add(AddGameToUserList $request)
    {
        //pobrnie gry z katalogu gier
        // zwalidowanie jeśli gra istnieje w systemie

        //dodanie gry do użytkonika przekazując obiekt


        $data = $request->validated();
        $gameId = (int) $data['gameId'];

        $game = $this->gameRepository->get($gameId);

        $user = Auth::user();
        $user->addGame($game);

        return redirect()
            ->route('games.show', ['game' => $gameId])
            ->with('success', 'gra została dodana');
    }

    public function remove(RemoveGameFromUserlist $request)
    {
        $data = $request->validated();
        $gameId = (int) $data['gameId'];

        $game = $this->gameRepository->get($gameId);

        $user = Auth::user();
        $user->removeGame($game);

        return redirect()
            ->route('games.show', ['game' => $gameId])
            ->with('success', 'gra została usunięta');
    }

    public function rate(RateGame $request)
    {
        $data = $request->validated();
        $gameId = (int) $data['gameId'];
        //sprawdzamy czy jest rate. jeśli jest to rzutujemy, jeśli nie ma to przekazujemy null
        $rate = $data['rate'] ? (int) $data['rate'] : null;

        $game = $this->gameRepository->get($gameId);

        $user = Auth::user();
        $user->rateGame($game, $rate);

        return redirect()
        ->route('me.games.list', ['game' => $gameId])
        ->with('success', 'ocena została zapisana');
}
    
}
