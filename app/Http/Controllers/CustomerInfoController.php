<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Tour;

class CustomerInfoController extends Controller
{
    public function getCustomerInfo($customerId)
    {
        // Using $customerId to fetch customer information from the database
        $customerInfo = Customer::where('cus_id', $customerId)->first();

        return response()->json(['customerInfo' => $customerInfo]);
    }

    public function getTourInfo($tourId)
    {
        // Using $tourId to fetch tour information from the database
        $tourInfo = Tour::where('tour_id', $tourId)->first();

        return response()->json(['tourInfo' => $tourInfo]);
    }


}
