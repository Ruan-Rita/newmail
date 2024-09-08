<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ( Customer::count() <= 50) {
            Customer::factory()->count(50)->create([
                'user_id' => User::where('email', 'ruan@nexmail.com')->firstOrFail()->id
            ]);
        }
    }
}
