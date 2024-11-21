<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function storeBooking(Request $request)
    {
    $validatedData = $request->validate([
        'cus_id' => 'required|string',
        'tour_id' => 'required|string|max:10',
        'duration' => 'required|string|max:255',
        'booking_by' => 'required|string|max:255',
        'amount' => 'required|string',
        'dis_amount' => 'required|numeric',
        'total' => 'required|numeric',
    ]);

    Booking::create($validatedData);

    return response()->json(['message' => 'Booking created successfully']);
}
    public function getTotalBookings()
        {
            $totalBookings = Booking::count();
            return response()->json(['totalBookings' => $totalBookings]);
        }
}

