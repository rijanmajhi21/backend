<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tour_id' => 'required|string|max:10',
            'tour_title' => 'required|string|max:200',
            'duration' => 'required|string|max:30',
            'price' => 'required|numeric',
            'operator' => 'required|string|max:150',
            'tour_type' => 'required|string|max:40',
        ]);

        // Create a new tour
        $tour = Tour::create($validatedData);

        return response()->json(['message' => 'Tour stored successfully', 'tour' => $tour]);
    }
    public function getTotalTours()
        {
            $totalTours = Tour::count();
            return response()->json(['totalTours' => $totalTours]);
            
        }
}
