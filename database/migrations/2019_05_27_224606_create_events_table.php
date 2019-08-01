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
            $table->dateTime('doctor_started_at')->nullable();
            $table->dateTime('doctor_ended_at')->nullable();
            $table->bigInteger('surgery_id', false, true);
            $table->bigInteger('surgical_room_id', false, true);
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
