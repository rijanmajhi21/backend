<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public static $rules = [
        'tour_id' => 'string',  // Check if this rule is present
        // Other rules...
    ];
    protected $fillable = [
        'cus_id', 'tour_id', 'duration', 'booking_by', 'amount', 'dis_amount', 'total'
    ];
}
