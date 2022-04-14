<?php

namespace App\Http\Controllers\Game;

use App\Model\Game;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\RequestLog;
use App\Repository\Eloquent\GameRepository;

class EloquentController extends Controller
{

    //Dependency injection 

    // po staremu przypisanie w konstruktorze - NIE STOSOWAĆ!!!
    // private $fileAdapter;

    // public function __construct()
    // {
    //     $this->fileAdapter = new FileAdapter('aaa', 'bbb');
    // }

    //aktualne Dependency injection
    // private FileAdapter $fileAdapter;

    // public function __construct(FileAdatpter $fileAdatpter)
    // {
    //     $this->fileAdapter = $fileAdatpter;
    // }

    //prawidłowe z wstrzykiwaniem interfejsu
    // private AdapterInterface $adapter;
    // public function __construct(AdapterInterface $adapter)
    // {
    //     $this->adapter = $adapter;
    // }

    private GameRepository $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        
    }


    public function index(): View
    {
        $this->middleware(RequestLog::class);

        // bez użycia dependency injection w kontrolerze
        // $games = Game::with('genre')
        //     ->orderBy('crated_at')
        //     ->paginate(10);

        $games = $this->gameRepository->allPaginated(10);

        return view('game.eloquent.list', [
            'games' => $games
        ]);
    }

    public function dashboard(): View
    {
        $bestGames = Game::best()->get();

        $stats = [
            'count' => Game::count(),
            'countScoreGtSeven' => Game::where('score', '>', 7)->count(),
            'max' => Game::max('score'),
            'min' => Game::min('score'),
            'avg' => Game::avg('score'),
        ];

        $scoreStats = Game::select(
            Game::raw('count(*) as count'),
            'score'
        )
            ->having('count', '>', 10)
            ->groupBy('score')
            ->orderBy('count', 'desc')
            ->get();

        return view('game.eloquent.dashboard', [
            'bestGames' => $bestGames,
            'stats' => $stats,
            'scoreStats' => $scoreStats
        ]);
    }

    public function show(int $gameId, Request $request): View
    {
        // $isAjax = false;
        // if ($request->ajax()) {
        //     $isAjax = true;
        // }

        $game = Game::find($gameId);

        return view('game.eloquent.show', [
            'game' => $game
        ]);
    }
}
