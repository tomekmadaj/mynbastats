<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;

class Player_Stat extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'player_stats';
    protected $primaryKey = 'personId';

    public $sortable = [
        'gamesPlayed',
        'min',
        'fgm',
        'fga',
        'tpm',
        'tpa',
        'assists',
        'totReb',
        'steals',
        'blocks',
        'turnovers',
        'ppg',
        'plusMinus',
        'mpg',
        'fgp',
        'ftp',
        'tpp',
        'rpg',
        'apg',
        'bpg',
        'spg',
        'topg',
        'points'
    ];

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
