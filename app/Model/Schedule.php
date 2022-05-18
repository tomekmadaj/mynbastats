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
        return $this->hasMany('App\Model\GameBoxscore', 'gameId', 'gameId');
    }

    public function gameLeaders()
    {
        return $this->hasMany('App\Model\GameLeaders', 'gameId', 'gameId');
    }

    public function playerBoxscore()
    {
        return $this->hasMany('App\Model\PlayerBoxscore', 'gameId', 'gameId');
    }

    public function hTeams()
    {
        return $this->belongsTo('App\Model\Team', 'hTeamId', 'teamId');
    }

    public function vTeams()
    {
        return $this->belongsTo('App\Model\Team', 'vTeamId', 'teamId');
    }
}
