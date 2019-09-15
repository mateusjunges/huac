<?php

namespace HUAC\Actions;

use HUAC\Enums\Status;
use HUAC\Events\MaterialsConfirmedBySurgeryCenter;
use HUAC\Models\Log;

class ConfirmSurgeryCenterMaterials
{
    public static function execute($surgery, $observation)
    {
        event(new MaterialsConfirmedBySurgeryCenter($surgery));

        return Log::createFor($surgery, $observation, Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER);
    }
}
