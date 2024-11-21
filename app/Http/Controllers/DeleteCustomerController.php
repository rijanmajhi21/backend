<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;


class DeleteCustomerController extends Controller
{
    public function deleteCustomer($customerId)
    {
        try {
            $customer = Customer::findOrFail($customerId);
            $customer->delete();

            return response()->json(['message' => 'Customer deleted successfully']);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error deleting customer: ' . $e->getMessage());
        
            // Return an error response
            return response()->json(['error' => 'Error deleting customer'], 500);
        }
    }
}
