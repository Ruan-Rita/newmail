<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailTrackingApiController extends Controller
{
    public function trackOpen(Request $request, $email) {
        // find origem
        // registra analise
        // <img src="{{ url('track-email/' . $email_id) }}" alt="." width="1" height="1">

    }
    public function trackLink(Request $request, $email) {
        // find origem
        // registra analise
        // <img src="{{ url('track-email/' . $email_id) }}" alt="." width="1" height="1">

    }

    // public function store(Request $request)
    // {
    //     $clientIp = $request->ip();
    //     $response = Http::get("http://ip-api.com/json/{$clientIp}");

    //     if ($response->successful()) {
    //         $locationData = $response->json();
            
    //         // Captura os dados de localização
    //         $location = [
    //             'city' => $locationData['city'] ?? null,
    //             'region' => $locationData['regionName'] ?? null,
    //             'country' => $locationData['country'] ?? null,
    //         ];

    //         // Cria um registro na tabela campaign_metrics
    //         CampaignMetric::create([
    //             'campaign_id' => 1, // Substitua pelo ID correto
    //             'user_id' => 123, // Substitua pelo ID correto
    //             'interaction_type' => 'click',
    //             'user_agent' => $request->userAgent(),
    //             'location' => json_encode($location), // Armazenando como JSON, se preferir
    //             'interaction_time' => now(),
    //         ]);
    //     }
    // }
}
