<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 70)->nullable(false);
            $table->string('color', 7)->nullable(false);
            $table->dateTime('start_at')->nullable(false);
            $table->dateTime('end_at')->nullable(false);
            $table->bigInteger('surgery_id', false, true);
            $table->bigInteger('surgical_room_id', false, true);
            $table->dateTime('entrance_at_surgical_center')->nullable();
            $table->dateTime('entrance_at_surgical_room')->nullable();
            $table->dateTime('time_out_at')->nullable();
            $table->dateTime('anesthetic_induction')->nullable();
            $table->dateTime('surgeon_started_at')->nullable();
            $table->dateTime('surgeon_ended_at')->nullable();
            $table->dateTime('exit_surgical_room')->nullable();
            $table->dateTime('entrance_repai')->nullable();
            $table->dateTime('exit_repai')->nullable();
            $table->dateTime('exit_surgery_center')->nullable();
            $table->foreign('surgery_id')
                ->references('id')
                ->on('surgeries');
            $table->foreign('surgical_room_id')
                ->references('id')
                ->on('surgical_rooms');
            $table->softDeletes();
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
        Schema::dropIfExists('events');
    }
}
