<?php

namespace App\Model;

use App\Model\Game;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'team', 'player'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function players()
    {
        return $this->hasOne('App\Model\Player', 'personId', 'personId');
    }

    public function teams()
    {
        return $this->hasOne('App\Model\Team', 'teamId', 'teamId');
    }

    public function games()
    {
        //argumenty: nazwa tabeli do której chcemy się dobrać, nazwa tabeli pośredniczącej
        //withpivot() - definiujemy jaką kolumnę chcemy jeszcze wicągnąć
        //za pomocą tej metody wyciąniemy dane z pivota
        //domyślnie pivot służy to połaczenia użytkoników z grami i żadne dane nie są w ztego pivota wyciągane
        return $this->belongsToMany(Game::class, 'userGames')
            ->withPivot('rate')
            ->with('genres');
    }

    public function addGame(Game $game): void
    {
        //dd($game);
        $this->games()->save($game);
    }

    public function userHasGame(int $gameId): bool
    {
        $game = $this->games()
            ->where('userGames.game_id', $gameId)
            ->first();

        // jak znajdzie gre to rzutujemey na bool true
        return (bool) $game;
    }

    public function removeGame(Game $game)
    {
        //odpięcie gry od użytkownika podajemy identyfikator których chemy odpiąć
        //
        $this->games()->detach($game->id);
    }

    public function rateGame(Game $game, ?int $rate): void
    {
        //metoda Belongstomany udostepnia nam updateExistingPivot()
        //dzięki temu zaktualizujemy wpis w tabeli pośredniej tzw. pivocie
        $this->games()->updateExistingPivot($game, ['rate' => $rate]);
    }

    public function isAdmin(): bool
    {
        return (bool) $this->admin;
    }
}
