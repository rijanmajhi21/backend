<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class ViewCustomerController extends Controller
{
    public function viewCustomer($customerId)
    {
        // Assuming 'cus_id' is the column in the Customer model that corresponds to the customer ID
        $customer = Customer::where('cus_id', $customerId)->get();

        if ($customer->isEmpty()) {
            return response()->json(['error' => 'Customer not found '], 404);
        }

        return response()->json($customer);
    }
}
