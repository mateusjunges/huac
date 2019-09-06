<?php

namespace HUAC\Enums;

/**
 * Class Status
 * @package HUAC\Enums
 */
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
    const MATERIALS_CONFIRMED_BY_SURGERY_CENTER       = 15;
    const MATERIALS_DENIED_BY_SURGERY_CENTER       = 16;
    const RESCHEDULED_AFTER_MATERIALS_CONFIRMATION = 17;
    const SURGICAL_COMPLICATIONS                   = 18;
    const DELETED                                  = 19;
    const PATIENT_AT_SURGERY_CENTER                = 20;
    const PATIENT_AT_SURGICAL_ROOM                 = 21;
    const TIMEOUT_DONE                             = 22;
    const ANESTHETIC_INDUCTION                     = 23;
    const PATIENT_OUT_OF_SURGICAL_ROOM             = 24;
    const PATIENT_AT_REPAI                         = 25;
    const PATIENT_EXITED_REPAI                     = 26;
    const PATIENT_EXITED_SURGERY_CENTER            = 27;
}
