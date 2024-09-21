<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignMetrics;
use App\Models\User;
use Illuminate\Database\Seeder;

class CampaignMetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userQuery = [
            'user_id' => $user_id = User::where('email', 'ruan@nexmail.com')->firstOrFail()->id,
            'campaign_id' => Campaign::where('user_id', $user_id)->firstOrFail(),
        ];

        if ( CampaignMetrics::count() <= 100) {
            CampaignMetrics::factory()->clickInteraction()->count(10)->create($userQuery);
            CampaignMetrics::factory()->openInteraction()->count(40)->create($userQuery);
            CampaignMetrics::factory()->unsubscribeInteraction()->count(10)->create($userQuery);
            CampaignMetrics::factory()->conversionInteraction()->count(30)->create($userQuery);
            CampaignMetrics::factory()->formSubmitInteraction()->count(10)->create($userQuery);
        }
    }
}
