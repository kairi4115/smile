<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_records', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->dateTime('transport_date');
            $table->string('departure_location');
            $table->string('destination');
            $table->string('passenger_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_records');
    }
};
