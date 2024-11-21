<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('customer_name');
            $table->string('email')->unique();
            $table->string('phone_no');
            $table->text('address');
            $table->integer('booking')->default(0); // Assuming booking is an integer column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
