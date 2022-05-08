<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->hasOne('App\Model\Team', 'teamId', 'teamId');
    }
}
