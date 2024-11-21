<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;
    public static function generateUniqueId()
    {
        do {
            $alphaPart = strtoupper(Str::random(3));  // Generates 3 random alphabets
            $numPart = strval(rand(100, 999));        // Generates a 3-digit random number
            $cus_id = $alphaPart . $numPart;
        } while (self::where('cus_id', $cus_id)->exists());

        return $cus_id;
    }
    protected $fillable = ['customer_name', 'email', 'phone_no', 'address', 'booking'];

}
