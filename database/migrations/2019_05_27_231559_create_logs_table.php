<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('observation')->nullable(false);
            $table->bigInteger('surgery_id', false, true);
            $table->bigInteger('status_id', false, true);
            $table->bigInteger('user_id', false, true);
            $table->foreign('surgery_id')
                ->references('id')
                ->on('surgeries');
            $table->foreign('status_id')
                ->references('id')
                ->on('status');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('logs');
    }
}
