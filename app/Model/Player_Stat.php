<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player_Stat extends Model
{
    use HasFactory;

    protected $table = 'player_stats';

    public function players()
    {
        return $this->hasMany('App\Model\Player', 'personId', 'personId');
    }

    public function teams()
    {
        return $this->hasMany('App\Model\Team', 'teamId', 'teamId');
    }
}
