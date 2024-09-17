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
}
