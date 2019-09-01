<?php

namespace HUAC\Actions;

use HUAC\Enums\Status;
use HUAC\Models\Log;

class ConfirmSurgeryCenterMaterials
{
    public static function execute($surgery, $observation)
    {
        return Log::createFor($surgery, $observation, Status::MATERIALS_CONFIRMED_SURGERY_CENTER);
    }
}
