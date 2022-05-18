<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameLeaders extends Model
{
    use HasFactory;

    protected $table = 'games_leaders';

    protected $primaryKey = 'gameId';

    public function schedule()
    {
        return $this->belongsToMany('App\Model\Schedule', 'gameId', 'gameId');
    }
}
