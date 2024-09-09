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
    public function index()
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
    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $customer = Customer::findOrFail($id);
        $customer->update($data);
        return $this->json($customer);
    }

    public function destroy(Request $request, $id)
    {
        $customer = Customer::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        $customer->delete();
        
        return $this->json($customer);
    }
}
