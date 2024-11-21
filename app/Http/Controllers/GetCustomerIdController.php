<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class GetCustomerIdController extends Controller
{
    public function getCustomerIds()
    {
        $customerIds = Customer::orderBy('cus_id' , 'asc')->pluck('cus_id');

        return response()->json(['customerIds' => $customerIds]);
    }
}
