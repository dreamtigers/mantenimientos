<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $db = DB::connection('traccar')->getDatabaseName();

            $table->bigIncrements('id');

            $table->date('performed_at');

            $table->integer('device_id');
            $table->foreign('device_id')->references('id')->on($db . '.tc_devices');
            $table->integer('maintenance_id');
            $table->foreign('maintenance_id')->references('id')->on($db . '.tc_maintenances');
            $table->integer('position_id');
            // I'm not sure if we should link to the positions or not Traccar.
            // For example, does not link through a fk the device to the
            // position, even tho it's capable of.
            // $table->foreign('position_id')->references('id')->on($db . '.tc_positions');

            $table->unsignedBigInteger('total_hours');
            $table->unsignedBigInteger('total_distance');

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
        Schema::dropIfExists('records');
    }
}
