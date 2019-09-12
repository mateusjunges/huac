<?php

namespace HUAC\Actions;

use HUAC\Enums\Status;
use HUAC\Events\MaterialsDeniedBySurgeryCenter;
use HUAC\Models\Log;
use HUAC\Models\Surgery;

class DenySurgeryCenterMaterials
{
    /**
     * @param Surgery $surgery
     * @param $observation
     * @param $status
     * @return mixed
     */
    public static function execute(Surgery $surgery, $observation)
    {
        event(new MaterialsDeniedBySurgeryCenter($surgery));

        $surgery->events()->delete();

        return Log::createFor($surgery, $observation, Status::MATERIALS_DENIED_BY_SURGERY_CENTER);
    }
}
