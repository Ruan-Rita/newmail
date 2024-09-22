<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsApiController extends Controller
{
    public function update(Request $request)
    {
        $settings = $request->user()->settings;

        if (! $settings) {
            $settings = $settings::create(['user_id' => $request->user()->id]);
        }

        $data = $request->only([
            'plan', 
            'plan_limit_notify', 
            'resource_created_notify'
        ]);

        // Mescle os dados
        $mergedSettings = $settings->fill($data);
        $mergedSettings->save();
        return $this->json($mergedSettings);
    }
}
