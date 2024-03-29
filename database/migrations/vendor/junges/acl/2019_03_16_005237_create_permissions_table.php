<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissionsTable = config('acl.tables.permissions', 'permissions');
        Schema::create($permissionsTable, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->unique()->nullable(false);
            $table->string('slug', 50)->nullable(false);
            $table->text('description')->nullable(false);
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
        $tables = config('acl.tables');
        Schema::dropIfExists($tables['permissions']);
    }
}
