<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Library\WebSiteLib;
use App\Models\Website;
use Auth;
use Illuminate\Http\Request;

class WebSiteApiController extends Controller
{
    public function index()
    {
        $websites = Website::orderBy('created_at', 'DESC')
            ->where('user_id', Auth::user()->id)
            ->paginate(7);

        $websites->getCollection()->transform(function ($website) {
            $website->publish_text = $website->publish ?: 'UnPublish';
            return $website;
        });
        return $this->json($websites);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['logo'] = $request->file('logo');
        $library = new WebSiteLib($request->user());
        
        if (! $library->validation($request)) {
            return $this->jsonError($library->message(), $library->errors());
        }

        $newWebsite = $library->storeWebsite($data);
        return $this->json($newWebsite);
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $library = new WebSiteLib($request->user());
        
        $request->validate([
            'content' => 'required|string'
        ]);

        $updated = $library->updateWebsite($id, $data);
        return $this->json($updated);
    }

    public function destroy(Request $request, $id)
    {
       
    }
}
