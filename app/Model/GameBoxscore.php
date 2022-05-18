<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameBoxscore extends Model
{
    use HasFactory;

    protected $table = 'games_boxscore';

    protected $primaryKey = 'gameId';

    public function schedule()
    {
        return $this->belongsToMany('App\Model\Schedule', 'gameId', 'gameId');
    }
}
