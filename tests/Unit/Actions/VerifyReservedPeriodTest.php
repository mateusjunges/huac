<?php

namespace Tests\Unit\Actions;

use HUAC\Actions\VerifyReservedPeriod;
use Tests\TestCase;

class VerifyReservedPeriodTest extends TestCase
{
    public function test_it_returns_true_if_the_event_uses_the_reserved_period()
    {
        $this->assertTrue(
            VerifyReservedPeriod::execute('', '', '')
        );
    }

    public function test_it_returns_false_if_the_event_does_not_use_the_reserved_period()
    {
        $this->assertFalse(
            VerifyReservedPeriod::execute('', '', '')
        );
    }
}
