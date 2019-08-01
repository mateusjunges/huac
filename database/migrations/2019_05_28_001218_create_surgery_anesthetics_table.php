<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeryAnestheticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgery_anesthetics', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('surgery_id',false, true);
            $table->bigInteger('anesthesia_id', false, true);
            $table->foreign('surgery_id')
                ->references('id')
                ->on('surgeries');
            $table->foreign('anesthesia_id')
                ->references('id')
                ->on('anesthetics');
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
        Schema::dropIfExists('surgery_anesthetics');
    }
}
