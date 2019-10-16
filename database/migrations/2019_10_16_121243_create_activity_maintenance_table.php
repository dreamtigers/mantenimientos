<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_activity_maintenance', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('maintenance_id');
            $table->foreign('maintenance_id')->references('id')->on('tc_maintenances');

            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('mt_activities');

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
        Schema::dropIfExists('mt_activity_maintenance');
    }
}
