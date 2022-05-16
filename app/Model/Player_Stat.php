<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player_Stat extends Model
{
    use HasFactory;

    protected $table = 'player_stats';

    protected $primaryKey = 'personId';

    public function players()
    {
        return $this->hasMany('App\Model\Player', 'personId', 'personId');
    }

    public function teams()
    {
        return $this->hasMany('App\Model\Team', 'teamId', 'teamId');
    }

    public function scopeBestStats(Builder $query, $teamId, $stat, $seasonYear): Builder
    {
        if ($teamId == 'all') {
            return $query
                ->where('seasonYear', '=', $seasonYear)
                ->orderBy($stat, 'desc')
                ->limit(5);
        }

        return $query->where('teamId', '=', $teamId)
            ->where('seasonYear', '=', $seasonYear)
            ->orderBy($stat, 'desc')
            ->limit(5);
    }
}
