<?php

namespace HUAC\Actions;

use HUAC\Enums\Status;
use HUAC\Models\Log;
use HUAC\Models\Surgery;

class DenyCMEMaterials
{
    /**
     * @param Surgery $surgery
     * @param $observation
     * @param $status
     * @return mixed
     */
    public static function execute(Surgery $surgery, $observation)
    {
        $surgery->events()->delete();
        return Log::createFor($surgery, $observation, Status::MATERIALS_DENIED_BY_CME);
    }
}
