<?php

namespace HUAC\Actions;

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
    public static function execute(Surgery $surgery, $observation, $status)
    {
        $surgery->events()->delete();
        return Log::createFor($surgery, $observation, $status);
    }
}
