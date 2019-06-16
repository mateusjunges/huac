<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgicalRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgical_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 70)
                ->unique()
                ->nullable(false);
            $table->boolean('available')
                ->nullable(false)
                ->default(true);
            $table->string('morning_reservation_starts_at', 8)->nullable(false);
            $table->string('morning_reservation_ends_at', 8)->nullable(false);
            $table->string('afternoon_reservation_starts_at', 8)->nullable(false);
            $table->string('afternoon_reservation_ends_at', 8)->nullable(false);
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
        Schema::dropIfExists('surgical_rooms');
    }
}
