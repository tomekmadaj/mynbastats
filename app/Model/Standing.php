<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Standing extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->hasOne('App\Model\Team', 'teamId', 'teamId');
    }

    public function scopeWest(Builder $query)
    {
        return $query->where('conference', '=', 'west');
    }

    public function scopeEast(Builder $query)
    {
        return $query->where('conference', '=', 'east');
    }
}
