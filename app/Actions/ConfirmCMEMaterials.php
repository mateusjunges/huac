<?php

namespace HUAC\Actions;

use HUAC\Enums\Status;
use HUAC\Models\Log;
use HUAC\Models\Surgery;

class ConfirmCMEMaterials
{
    /**
     * @param Surgery $surgery
     * @param $observation
     * @param $status
     * @return mixed
     */
    public static function execute(Surgery $surgery, $observation)
    {
        return Log::createFor($surgery, $observation, Status::MATERIALS_CONFIRMED_BY_CME);
    }
}
