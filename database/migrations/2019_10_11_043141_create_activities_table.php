<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $db = DB::connection('traccar')->getDatabaseName();

            $table->bigIncrements('id');

            $table->text('description');

            $table->integer('maintenance_id');
            $table->foreign('maintenance_id')->references('id')->on($db . '.tc_maintenances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
