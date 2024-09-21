<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ( Campaign::count() <= 50) {
            Campaign::factory()->count(50)->create([
                'user_id' => User::where('email', 'ruan@nexmail.com')->firstOrFail()->id,
            ]);
        }
    }
}
