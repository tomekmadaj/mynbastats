<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerBoxscore extends Model
{
    use HasFactory;

    protected $table = 'games_players_boxscore';

    protected $primaryKey = 'gameId';

    public function schedule()
    {
        return $this->belongsToMany('App\Model\Schedule', 'gameId', 'gameId');
    }
}
