<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CampaignApiController extends Controller
{
    public function index(Request $request)
    {
        $campaigns = Campaign::orderBy('created_at', 'DESC')
            ->where('user_id', Auth::user()->id)
            ->paginate(7);

        return $this->json($campaigns);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $data['send_at'] = Carbon::parse($data['send_at']);
        $campaign = Campaign::create($data);
        return $this->json($campaign);
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
