<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    protected $primaryKey = 'gameId';

    public function gameBoxscore()
    {
        return $this->hasMany('App\Model\GameBoxscore', 'gameId', 'gameID');
    }

    public function gameLeaders()
    {
        return $this->hasMany('App\Model\GameLeaders', 'gameId', 'gameID');
    }

    public function playerBoxscore()
    {
        return $this->hasMany('App\Model\PlayerBoxscore', 'gameId', 'gameID');
    }
}
