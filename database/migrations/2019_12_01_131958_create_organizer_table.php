<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->increments('organizer_id');
            $table->string('organizer_email', 100)->unique();
            $table->string('organizer_password');
            $table->string('organizer_name', 100);
            $table->foreign('organizer_type_id')->references('organizer_type_id')->on('organizer_type');
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->string('organizer_phone_number', 20);
            $table->boolean('organizer_is_active')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('Organizers');
    }
}
