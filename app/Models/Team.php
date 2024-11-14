<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Matches;


class Team extends Model
{
    protected $fillable = ['name'];

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_team');
    }

    public function matches()
    {
        return $this->hasMany(Matches::class, 'team1_id')->orWhere('team2_id', $this->id);
    }
}
