<?php

namespace Tests\Unit\Actions;

use Carbon\Carbon;
use HUAC\Actions\VerifyReservedPeriod;
use HUAC\Models\SurgicalRoom;
use Tests\TestCase;

class VerifyReservedPeriodTest extends TestCase
{
    public function test_it_returns_true_if_the_event_uses_the_reserved_period()
    {
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::first(),
                Carbon::createFromTime(8, 0,0),
                Carbon::createFromTime(9, 0, 0)
            )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::first(),
                Carbon::createFromTime(8, 30,0),
                Carbon::createFromTime(9, 30, 0)
            )
        );
        $this->assertTrue(
           VerifyReservedPeriod::execute(
               SurgicalRoom::first(),
               Carbon::createFromTime(13, 0, 0),
               Carbon::createFromTime(14, 0, 0)
           )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::first(),
                Carbon::createFromTime(13, 30,0),
                Carbon::createFromTime(14, 30, 0)
            )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(2),
                Carbon::createFromTime(9, 0,0),
                Carbon::createFromTime(10, 0, 0)
            )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(2),
                Carbon::createFromTime(9, 30,0),
                Carbon::createFromTime(10, 30, 0)
            )
        );
        $this->assertTrue(
           VerifyReservedPeriod::execute(
               SurgicalRoom::find(2),
               Carbon::createFromTime(14, 0, 0),
               Carbon::createFromTime(15, 0, 0)
           )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(2),
                Carbon::createFromTime(14, 30, 0),
                Carbon::createFromTime(15, 30, 0)
            )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(3),
                Carbon::createFromTime(10, 0,0),
                Carbon::createFromTime(11, 0, 0)
            )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(3),
                Carbon::createFromTime(10, 30,0),
                Carbon::createFromTime(11, 30, 0)
            )
        );
        $this->assertTrue(
           VerifyReservedPeriod::execute(
               SurgicalRoom::find(3),
               Carbon::createFromTime(15, 0, 0),
               Carbon::createFromTime(16, 0, 0)
           )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(3),
                Carbon::createFromTime(15, 30, 0),
                Carbon::createFromTime(16, 30, 0)
            )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(4),
                Carbon::createFromTime(11, 0,0),
                Carbon::createFromTime(12, 0, 0)
            )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(4),
                Carbon::createFromTime(11, 30,0),
                Carbon::createFromTime(12, 30, 0)
            )
        );
        $this->assertTrue(
           VerifyReservedPeriod::execute(
               SurgicalRoom::find(4),
               Carbon::createFromTime(16, 0, 0),
               Carbon::createFromTime(17, 0, 0)
           )
        );
        $this->assertTrue(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(4),
                Carbon::createFromTime(16, 30, 0),
                Carbon::createFromTime(17, 30, 0)
            )
        );
    }

    public function test_it_returns_false_if_the_event_does_not_use_the_reserved_period()
    {
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(1),
                Carbon::createFromTime(9, 0, 0),
                Carbon::createFromTime(10,  0, 0)
            )
        );
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(1),
                Carbon::createFromTime(14, 0, 0),
                Carbon::createFromTime(15, 0, 0)
            )
        );
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(2),
                Carbon::createFromTime(10, 0, 0),
                Carbon::createFromTime(11, 0, 0)
            )
        );
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(2),
                Carbon::createFromTime(15, 0, 0),
                Carbon::createFromTime(16, 0, 0)
            )
        );
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(3),
                Carbon::createFromTime(11, 0, 0),
                Carbon::createFromTime(12, 0 ,0)
            )
        );
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(3),
                Carbon::createFromTime(16, 0, 0),
                Carbon::createFromTime(17, 0, 0)
            )
        );
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(4),
                Carbon::createFromTime(12, 0, 0),
                Carbon::createFromTime(13, 0, 0)
            )
        );
        $this->assertFalse(
            VerifyReservedPeriod::execute(
                SurgicalRoom::find(4),
                Carbon::createFromTime(17, 0, 0),
                Carbon::createFromTime(18, 0, 0)
            )
        );
    }
}
