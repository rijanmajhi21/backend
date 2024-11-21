<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class GetTourController extends Controller
{
    public function getTours()
    {
        // Fetch all tours
        $tours = Tour::paginate(10);

        return response()->json(['tours' => $tours]);
    }

    public function searchTours(Request $request)
    {
        $searchQuery = $request->input('search');

        $tours = Tour::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('tour_id', 'LIKE', '%' . $searchQuery . '%');
        })->get();

        return response()->json(['tours' => $tours]);
    }
}
