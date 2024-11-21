<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class GetCustomerController extends Controller
{
    public function getCustomers()
    {
        // Retrieve all customers from the database
        $customers = Customer::paginate(10); // Fetch 10 customers per page

        return response()->json(['customers' => $customers]);
    }

    public function searchCustomers(Request $request)
    {
        $query = $request->input('search');

        $customers = Customer::when($query, function ($q) use ($query) {
            $q->where('customer_name', 'like', '%' . $query . '%')
            ->orWhere('cus_id', 'like', '%' . $query . '%');
        })->get();

    return response()->json(['customers' => $customers]);
    }
}

