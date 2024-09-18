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

        return $this->json($websites);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['logo'] = $request->file('logo');
        $library = new WebSiteLib($request->user());
        
        if (! $library->validation($data)) {
            return $this->jsonError($library->message(), $library->errors());
        }

        $newWebsite = $library->storeWebsite($data);
        return $this->json($newWebsite);
    }
    
    public function update(Request $request, $id)
    {
        
    }

    public function destroy(Request $request, $id)
    {
       
    }
}
