<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgeries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estimated_duration_time')->nullable(false);
            $table->text('anesthetic_evaluation')->nullable();
            $table->text('materials')->nullable(false);
            $table->text('observation')->nullable();
            $table->bigInteger('procedure_id', false, true);
            $table->bigInteger('surgery_classification_id', false, true);
            $table->bigInteger('patient_id', false, true);
            $table->foreign('procedure_id')
                ->references('id')
                ->on('procedures');
            $table->foreign('surgery_classification_id')
                ->references('id')
                ->on('surgery_classifications');
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');
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
        Schema::dropIfExists('surgeries');
    }
}
