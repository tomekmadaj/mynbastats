<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $primaryKey = 'personId';

    public function teams()
    {
        return $this->belongsTo('App\Model\Team', 'teamId', 'teamId');
    }

    public function playerStats()
    {
        return $this->hasMany('App\Model\Player_Stat', 'personId', 'personId');
    }

    public function scopeActivePlayers(Builder $query)
    {
        return $query->where('isActive', '=', 1);
    }
}
