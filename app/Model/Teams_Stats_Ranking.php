<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams_Stats_Ranking extends Model
{
    protected $table = 'teams_stats_rankings';

    public function teams()
    {
        return $this->hasOne('App\Model\Team', 'teamId', 'teamId');
    }

    use HasFactory;
}
