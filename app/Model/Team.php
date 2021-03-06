<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $primaryKey = 'teamId';

    public function players()
    {
        return $this->hasMany('App\Model\Player', 'teamId', 'teamId');
    }

    public function playerStats()
    {
        return $this->hasMany('App\Model\Player_Stat', 'teamId', 'teamId');
    }

    public function teams_stats_rankings()
    {
        return $this->hasOne('App\Model\Teams_Stats_Ranking', 'teamId', 'teamId');
    }

    public function team_leaders()
    {
        return $this->belongsTo('App\Model\Teams_Leader', 'teamId', 'teamId');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'teamId', 'teamId');
    }

    public function gameBoxscore()
    {
        return $this->hasMany('App\Model\GameBoxscore', 'teamId', 'teamId');
    }

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule', 'teamId', 'teamId');
    }

    public function scopeCurrentTeams(Builder $query)
    {
        return $query->whereNotin('teamId', [0, 1610616833, 1610616834, 1710612762, 1810612762])->orderBy('fullName');
    }
}
