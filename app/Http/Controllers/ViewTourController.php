<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class ViewTourController extends Controller
{
    public function viewTour($tour_id)
    {
        // Assuming 'cus_id' is the column in the Booking model that corresponds to the customer ID
        $tours = Tour::where('tour_id', $tour_id)->get();

        if ($tours->isEmpty()) {
            return response()->json(['error' => 'Tours not found for the booking'], 404);
        }
        return response()->json($tours);
    }
}
