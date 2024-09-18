<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(2)->create();
        if (! User::where('email', 'ruan@nexmail.com')->exists()) {
            User::factory()->withPersonalTeam()->create([
                'name' => 'Test User',
                    'email' => 'ruan@nexmail.com',
                    'password'=> Hash::make('tO9}6EA83vjW'),
            ]);
        }
    }
}
