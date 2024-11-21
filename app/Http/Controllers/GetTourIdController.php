<?php

namespace App\Http\Controllers;
use App\Models\Tour;

use Illuminate\Http\Request;

class GetTourIdController extends Controller
{
    public function getTourIds()
    {
        $tourIds = Tour::orderBy('tour_id', 'asc')->pluck('tour_id');
        
        return response()->json(['tourIds' => $tourIds]);
    }
}
