<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package', function (Blueprint $table) {
            $table->bigIncrements('package_id');
            $table->bigInteger('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('vendor_id')->on('vendor');
            $table->string('package_name', 255);
            $table->bigInteger('package_price');
            $table->text('package_description')->default('');
            $table->boolean('package_is_active')->default(true);
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
        Schema::dropIfExists('package');
    }
}
