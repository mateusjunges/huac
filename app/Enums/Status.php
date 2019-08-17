<?php

namespace HUAC\Enums;

class Status
{
    const IN_PROCESS                               = 1;
    const SCHEDULED                                = 2;
    const LATE_TO_START                            = 3;
    const STARTED                                  = 4;
    const PROCEDURE_ONGOING                        = 5;
    const LATE_TO_FINISH                           = 6;
    const FINISHED                                 = 7;
    const IN_RESCHEDULING_PROCESS                  = 8;
    const EMERGENCY_PROCEDURE                      = 9;
    const RESCHEDULED                              = 10;
    const CANCELED                                 = 11;
    const WAITING_LIST                             = 12;
    const MATERIALS_CONFIRMED_BY_CME               = 13;
    const MATERIALS_DENIED_BY_CME                  = 14;
    const MATERIALS_CONFIRMED_SURGERY_CENTER       = 15;
    const MATERIALS_DENIED_BY_SURGERY_CENTER       = 16;
    const RESCHEDULED_AFTER_MATERIALS_CONFIRMATION = 17;
    const SURGICAL_COMPLICATIONS                   = 18;

}
