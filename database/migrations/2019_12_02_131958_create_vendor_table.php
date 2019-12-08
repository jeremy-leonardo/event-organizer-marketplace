<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
            $table->bigIncrements('vendor_id');
            $table->string('vendor_email', 255)->unique();
            $table->string('vendor_password', 255);
            $table->string('vendor_name', 255);
            $table->bigInteger('vendor_type_id')->unsigned()->default(1);
            $table->foreign('vendor_type_id')->references('vendor_type_id')->on('vendor_type');
            $table->bigInteger('city_id')->unsigned()->default(1);
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->string('vendor_phone_number', 20);
            $table->boolean('vendor_is_active')->default(true);
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
        Schema::dropIfExists('vendor');
    }
}
