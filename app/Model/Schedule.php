<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function hTeamsLeaders()
    {
        return $this->belongsTo('App\Model\GameLeaders', 'hTeamId', 'teamId');
    }

    public function vTeamsLeaders()
    {
        return $this->belongsTo('App\Model\GameLeaders', 'vTeamId', 'teamId');
    }

    public function hTeamsBoxscore()
    {
        return $this->belongsTo('App\Model\GameBoxscore', 'hTeamId', 'teamId');
    }

    public function vTeamsBoxscore()
    {
        return $this->belongsTo('App\Model\GameBoxscore', 'vTeamId', 'teamId');
    }

    public function scopeUserTeamSchedule(Builder $query, $teamId)
    {
        return $query->whereIn('hTeamId', [$teamId])->orWherein('vTeamId', [$teamId]);
    }
}
