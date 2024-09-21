<?php

namespace Database\Seeders;

use App\Enum\CampaignMetrics\InteractionTypeEnum;
use App\Models\Campaign;
use App\Models\CampaignMetrics;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Number;

class CampaignMetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalMetrics = count(InteractionTypeEnum::cases());

        $userQuery = [
            'user_id' => $user_id = User::where('email', 'ruan@nexmail.com')->firstOrFail()->id,
            'campaign_id' => Campaign::where('user_id', $user_id)->firstOrFail(),
        ];

        $emailsSent = Campaign::where('user_id', $user_id)->sum('emails_sent_count');

        $totalMetricsGenerated = rand($emailsSent*40/100, $emailsSent);

        if ( CampaignMetrics::count() <= $totalMetricsGenerated) {
            $forEachMetric = (int) $totalMetricsGenerated/$totalMetrics;
            
            CampaignMetrics::factory()->clickInteraction()->count($forEachMetric)->create($userQuery);
            CampaignMetrics::factory()->openInteraction()->count($forEachMetric)->create($userQuery);
            CampaignMetrics::factory()->unsubscribeInteraction()->count($forEachMetric)->create($userQuery);
            CampaignMetrics::factory()->conversionInteraction()->count($forEachMetric)->create($userQuery);
            CampaignMetrics::factory()->formSubmitInteraction()->count($forEachMetric)->create($userQuery);
        }
    }
}
