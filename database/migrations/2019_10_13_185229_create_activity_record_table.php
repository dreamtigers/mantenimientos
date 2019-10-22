<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_activity_record', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('record_id');
            $table->foreign('record_id')->references('id')->on('mt_records');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('mt_activities');

            $table->text('observation');

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
        Schema::dropIfExists('mt_activity_record');
    }
}
