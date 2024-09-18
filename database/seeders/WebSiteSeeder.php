<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

class WebSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ( Website::count() <= 5) {
            Website::factory()->count(5)->create([
                'user_id' => User::where('email', 'ruan@nexmail.com')->firstOrFail()->id
            ]);
        }
    }
}
