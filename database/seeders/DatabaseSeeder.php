<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DiseasesSeeder;
use Database\Seeders\SubDiseasesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Record diseases in DB
        $this->call(DiseasesSeeder::class);
        $this->call(SubDiseasesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(SettingsWebsiteSeeder::class);
    }
}
