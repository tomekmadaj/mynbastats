<?php

declare(strict_types=1);

namespace App\Repository\Builder;

use App\Model\Game;
use Illuminate\Support\Facades\DB;
use App\Repository\GameRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use stdClass;

class GameRepository implements GameRepositoryInterface
{
    public function __construct()
    {

    }

    public function get(int $id)
    {
        $data = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id', 'games.title', 'games.score', 'games.publisher', 'games.description',
                'genres.id as genre_id', 'genres.name as genre_name'
            )
            ->where('games.id', $id)
            ->limit(1)
            ->first()
            ;
        return $this->createGame($data);
    }

    public function all()
    {
        return DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id', 'games.title', 'games.score',
                'genres.id as genre_id', 'genres.name as genre_name'
            )
            ->latest('games.created_at')
            ->get()
            ->map(fn($row) => $this->createGame($row));
    }

    public function allPaginated(int $limit)
    {
        $pageName = 'page';
        $currentPage = Paginator::resolveCurrentPage($pageName);

        $baseQuery = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id');
        $total = $baseQuery->count();

        $data = collect();
        if ($total) {
            $data = $baseQuery
            ->select(
                'games.id', 'games.title', 'games.score',
                'genres.id as genre_id', 'genres.name as genre_name'
            )
            ->latest('games.created_at') //sortowanie
            ->forPage($currentPage, $limit) //
            ->get()
            ->map(fn($row) => $this->createGame($row));
        }

    return new LengthAwarePaginator(
            $data,
            $total,
            $limit,
            $currentPage,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' =>  $pageName
            ]
        );
    }

    public function best()
    {
        $data = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id', 'games.title', 'games.score',
                'genres.id as genre_id', 'genres.name as genre_name'
            )
            ->where('score', '>', 9)
            ->get()
            ->map(fn($row) => $this->createGame($row));

        return $data;
    }

    public function stats()
    {
        return [
            'count' => DB::table('games')->count(),
            'countScoreGtSeven' => DB::table('games')->where('score', '>', 7)->count(),
            'max' => DB::table('games')->max('score'),
            'min'=> DB::table('games')->min('score'),
            'avg'=> DB::table('games')->avg('score'),
        ];
    }

    public function scoreStats()
    {
        return DB::table('games')
            ->select(DB::raw('count(*) as count'), 'score')
            ->having('count', '>', 10)
            ->groupBy('score')
            ->orderBy('count', 'desc')
            ->get();
    }

    private function createGame(stdClass $game): stdClass
    {
        //mapowanie kluczy
        $genre = new stdClass();
        //ustawianie właściwości obiektu stdClass
        $genre->id = $game->genre_id;
        $genre->name = $game->genre_name;

        $game->genre = $genre;

        unset($game->genre_id, $game->genre_name);

        return $game;
    }
}
