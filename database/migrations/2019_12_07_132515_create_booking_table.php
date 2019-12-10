<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->bigInteger('booking_status_id')->unsigned()->default(1);
            $table->foreign('booking_status_id')->references('booking_status_id')->on('booking_status');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->date('event_date');
            $table->text('booking_description')->default('');
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
        Schema::dropIfExists('booking');
    }
}
