<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // dont change the order
        $this->call(UserSeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(WebSiteSeeder::class);
        $this->call(CampaignMetricSeeder::class);
    }
}
