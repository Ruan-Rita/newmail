<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class CampaignApiController extends Controller
{
    public function index(Request $request)
    {
        // dd(Auth::check(), auth()->user(), $request->user());
        // ->campaigns()->paginate($request->per_page);
        $campaigns = Campaign::orderBy('created_at', 'DESC')
            ->paginate(7);

        return $this->json($campaigns);
    }

    public function store(Request $request)
    {
        $campaign = Campaign::create($request->all());
        $this->json($campaign);
    }

    public function show(int $code)
    {
        $campaigns = Campaign::find($code);

        return $this->json($campaigns);
    }

    public function update(Request $request)
    {
        $campaign = Campaign::update($request->all());
        $this->json($campaign);
    }
}
