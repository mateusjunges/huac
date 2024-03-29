<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeonHasSurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgeon_has_surgeries', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('head_surgeon')
                ->nullable(false)
                ->default(false);
            $table->bigInteger('surgeon_id', false, true);
            $table->bigInteger('surgery_id', false, true);
            $table->foreign('surgeon_id')
                ->references('id')
                ->on('surgeons');
            $table->foreign('surgery_id')
                ->references('id')
                ->on('surgeries');
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
        Schema::dropIfExists('surgeon_has_surgeries');
    }
}
