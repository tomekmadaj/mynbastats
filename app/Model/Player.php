<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Player extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->belongsTo('App\Model\Team', 'teamId', 'teamId');
    }

    public function player_stats()
    {
        return $this->belongsToMany('App\Model\Player_Stat', 'personId', 'personId');
    }
}
