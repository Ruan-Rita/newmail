<?php

namespace App\Http\Controllers\Api;

use App\Enum\CampaignMetrics\InteractionTypeEnum;
use App\Models\Campaign;
use App\Models\Customer;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\CampaignMetrics;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class ReportsApiController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        // query - taxa de conversão para cada mês
        $conversionRatesInPercents = DB::table('campaign_metrics')
            ->select(
                DB::raw('strftime("%m", created_At) as month'), // Extrai o mês
                DB::raw('COUNT(CASE WHEN interaction_type = "conversion" THEN 1 END) as total_conversions'),
                DB::raw('COUNT(CASE WHEN interaction_type = "open" THEN 1 END) as total_opens')
            )
            ->whereYear('created_At', now()->format('Y'))
            ->groupBy(DB::raw('strftime("%m", created_At)'))
            ->get();

        $customers = Customer::where('user_id', $user_id)->count();
        $campaigns = Campaign::where('user_id', $user_id)->count();
        $emails_sent = Campaign::where('user_id', $user_id)->sum('emails_sent_count');
    
        // map - taxa de conversão para cada mês
        $conversionRatesInPercents->map(function ($item) {
            $item->conversion_rate_percents = $item->total_opens > 0 
                ? round(($item->total_conversions / $item->total_opens) * 100, 2) 
                : 0;
            return $item;
        });

        // taxa de conversão total
        $campaignMetrics = CampaignMetrics::where('user_id', $user_id)
            ->selectRaw('COUNT(CASE WHEN interaction_type = ? THEN 1 END) as opens', [InteractionTypeEnum::OPEN])
            ->selectRaw('COUNT(CASE WHEN interaction_type = ? THEN 1 END) as conversions', [InteractionTypeEnum::CONVERSION])
            ->first();

        $campaignOpens = $campaignMetrics->opens ?? 0;
        $conversion = $campaignMetrics->conversions ?? 0;
        $conversionRateTotalInPercents = $campaignOpens > 0 ? round(($conversion / $campaignOpens) * 100) : 0;
        $opensRateTotalInPercents = $emails_sent > 0 ? round(($campaignOpens / $emails_sent) * 100) : 0;
        $emailsSentFormatted = Number::abbreviate($emails_sent, 2);

        return $this->json(compact(
            'customers',
            'campaigns',
            'emailsSentFormatted',
            'opensRateTotalInPercents',
            'conversionRateTotalInPercents',
            'conversionRatesInPercents'
        ));
    }
}
