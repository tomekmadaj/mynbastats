<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team_Leader extends Model
{
    protected $table = 'team_leaders';

    use HasFactory;

    public function teams()
    {
        return $this->hasOne('App\Model\Team', 'teamId', 'teamId');
    }
}
