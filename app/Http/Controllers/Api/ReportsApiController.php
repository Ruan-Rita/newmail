<?php

namespace App\Http\Controllers\Api;

use App\Enum\CampaignMetrics\InteractionTypeEnum;
use App\Models\Campaign;
use App\Models\Customer;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\CampaignMetrics;
use Illuminate\Http\Request;

class ReportsApiController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $campaignMetrics = CampaignMetrics::orderBy('created_at', 'DESC')
            ->where('user_id', $user_id)
            ->where('interaction_type', InteractionTypeEnum::CONVERSION)
            ->paginate(7);
        
        $customers = Customer::where('user_id', $user_id)
            ->count();
            
        $campaigns = Campaign::where('user_id', $user_id)
            ->count();

        $emails_sent = Campaign::where('user_id', $user_id)
            ->sum('emails_sent_count');
        
        $campaignOpens = CampaignMetrics::where('interaction_type', InteractionTypeEnum::OPEN)
            ->where('user_id', $user_id)
            ->count();
        $conversion = CampaignMetrics::where('interaction_type', InteractionTypeEnum::CONVERSION)
            ->where('user_id', $user_id)
            ->count();
        
        $conversionRate = round($conversion / $campaignOpens *100);
        $conversionRatePerCents = "$conversionRate%";

        return $this->json(compact('customers', 'campaigns', 'emails_sent', 'campaignOpens', 'conversion', 'conversionRatePerCents', 'campaignMetrics'));
    }
}
