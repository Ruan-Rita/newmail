<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerApiController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::orderBy('created_at', 'DESC')
            ->where('user_id', Auth::user()->id)
            ->paginate(7);

        return $this->json($customers);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $customer = Customer::create($data);
        return $this->json($customer);
    }
}
