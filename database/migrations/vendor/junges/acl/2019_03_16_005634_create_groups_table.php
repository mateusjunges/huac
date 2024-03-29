<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $groupsTable = config('acl.tables.groups', 'groups');
        Schema::create($groupsTable, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->unique()->nullable(false);
            $table->string('slug', 50)->unique()->nullable(false);
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
        $groupsTable = config('acl.tables.groups', 'groups');
        Schema::dropIfExists($groupsTable);
    }
}
