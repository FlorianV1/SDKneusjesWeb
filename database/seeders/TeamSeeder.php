<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $teams = ['Team A', 'Team B', 'Team C', 'Team D'];
        foreach ($teams as $teamName) {
            Team::create(['name' => $teamName]);
        }
    }
}
