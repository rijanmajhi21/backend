<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class GetBookingController extends Controller
{
    public function getBookings()
    {
        $bookings = Booking::paginate(10); // Fetch 10 customers per page


        return response()->json(['bookings' => $bookings]);
    }

    public function searchBookings(Request $request)
    {
        $query = $request->input('search');

        $bookings = Booking::when($query, function ($q) use ($query) {
            $q->where('tour_id', 'like', '%' . $query . '%')
            ->orWhere('booking_by', 'like', '%' . $query . '%')
            ->orWhere('cus_id', 'like', '%' . $query . '%');
        })->get();

        return response()->json(['bookings' => $bookings]);
    }
}
