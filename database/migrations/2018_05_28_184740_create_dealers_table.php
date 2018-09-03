<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dealer_profiles_id');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('merchant_address');
            $table->string('contact_person');
            $table->integer('city_id');
            $table->float('merchant_lat');
            $table->float('merchant_long');
            $table->integer('merchant_radius');
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
        Schema::dropIfExists('dealers');
    }
}
