<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class ViewBookingController extends Controller
{
    public function viewBookings($customerId)
    {
        // Assuming 'cus_id' is the column in the Booking model that corresponds to the customer ID
        $bookings = Booking::where('cus_id', $customerId)->get();

        if ($bookings->isEmpty()) {
            return response()->json(['error' => 'Bookings not found for the customer'], 404);
        }

        return response()->json($bookings);
    }
}
