<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReschedulingHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rescheduling_history', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('rescheduling_reason_id', false, true);
            $table->bigInteger('log_id', false, true);
            $table->foreign('rescheduling_reason_id')
                ->references('id')
                ->on('reasons_for_rescheduling');
            $table->foreign('log_id')
                ->references('id')
                ->on('logs');
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
        Schema::dropIfExists('rescheduling_history');
    }
}
