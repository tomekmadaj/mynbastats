<?php

namespace App\Http\Controllers\Game;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Repository\Builder\GameRepository;
//use App\Repository\Eloquent\GameRepository;
use App\Repository\GameRepositoryInterface;
use Illuminate\Support\Facades\Log;
use App\Facade\Game;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private GameRepositoryInterface $gameRepository;

    //bez wskazja instrukcji w GameServiceProvider używaliśmy
    //private GameRepository $gameRepository;
    //    public function __construct(GameRepository $repository)

    public function __construct(GameRepositoryInterface $repository)
    {
        //dump(get_class($repository));
        $this->gameRepository = $repository;
    }

    public function index(Request $request): View
    {
        //$this->middleware(RequestLog::class);

        //przykłąd fasady
        // Log::alert('to jest fasada');

        $phrase = $request->get('phrase');
        $type = $request->get('type', GameRepositoryInterface::TYPE_DEFAULT);
        $limit = $request->get('size', 15);

        $resultPaginator = $this->gameRepository->filterBy($phrase, $type, $limit);

        //ustawienie paginatora, dodanie parametrów do paginacji
        $resultPaginator->appends(['phrase' => $phrase, 'type' => $type]);

        return view('game.list', [
            // 'games' => $this->gameRepository->allPaginated(10)

            // użycie fasady z app\facade
            //'games' => Game::allPaginated(10)
            'games' => $resultPaginator,
            'phrase' => $phrase,
            'type' => $type
        ]);
    }

    public function dashboard(): View
    {
        return view('game.dashboard', [
            'bestGames' => $bestGames = $this->gameRepository->best(),
            'stats' => $stats = $this->gameRepository->stats(),
            'scoreStats' => $scoreStats = $this->gameRepository->scoreStats()
        ]);
    }

    public function show(int $gameId, Request $request): View
    {
        // $isAjax = false;
        // if ($request->ajax()) {
        //     $isAjax = true;
        // }

        $user = Auth::user();
        $userHasGame  = $user->userHasGame($gameId);

        return view('game.show', [
            'game' => $game = $this->gameRepository->get($gameId),
            'userHasGame' => $userHasGame
        ]);
    }
}
