<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('cus_id');
            $table->string('tour_id');
            $table->string('duration');
            $table->string('booking_by');
            $table->decimal('amount', 10, 2);
            $table->decimal('dis_amount', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
