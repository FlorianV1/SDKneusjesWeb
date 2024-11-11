<?php

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call RoleSeeder to seed roles
        $this->call(RoleSeeder::class);
    }
}
