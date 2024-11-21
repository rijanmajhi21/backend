<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id');
            $table->string('tour_title');
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->string('operator');
            $table->string('tour_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
