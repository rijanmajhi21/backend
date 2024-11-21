<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_no' => 'required|string|max:20',
            'address' => 'required|string',
            'booking' => 'required|string',
        ]);

        $customer = Customer::create($validatedData);
        $customer->customer_name = $request->input('customer_name');
        // ... (other fields)
        $customer->cus_id = Customer::generateUniqueId(); // Ensure this line is present
        $customer->save();

        return response()->json(['message' => 'Customer created successfully', 'data' => $customer], 201);
    }
    public function getCustomerNames()
    {
        $customerNames = Customer::pluck('customer_name');

        return response()->json(['customerNames' => $customerNames]);
    }

    public function getTotalCustomers()
    {
        $totalCustomers = Customer::count();
        return response()->json(['totalCustomers' => $totalCustomers]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return response()->json($customer);
    }
}
