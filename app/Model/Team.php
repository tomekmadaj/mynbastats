<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->hasMany('App\Model\Player', 'teamId', 'teamId');
    }

    public function player_stats()
    {
        return $this->belongsToMany('App\Model\Player_Stat', 'teamId', 'teamId');
    }

    public function teams_stats_rankings()
    {
        return $this->hasOne('App\Model\Teams_Stats_Ranking', 'teamId', 'teamId');
    }
}
