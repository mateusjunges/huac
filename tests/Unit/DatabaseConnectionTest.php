<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseConnectionTest extends TestCase
{
  public function test_it_is_connected_to_database()
  {
      $connection = DB::connection()->getPdo() ? true : false;
      $this->assertTrue($connection);
      $this->assertTrue(Schema::hasTable('users'));
  }
}
