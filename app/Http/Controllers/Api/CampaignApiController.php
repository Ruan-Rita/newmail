<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignApiController extends Controller
{
    public function store(Request $request)
    {
        $campaign = Campaign::create($request->all());
        $this->json();
    }
}
