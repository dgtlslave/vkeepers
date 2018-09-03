<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('dealer_id');
            $table->string('startPlan');
            $table->string('endPlan');
            $table->integer('visitCondition');
            $table->integer('planExecutedInTime')->nullable();
            $table->integer('planExecutedOutTime')->nullable();
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
        Schema::dropIfExists('plan_conditions');
    }
}
