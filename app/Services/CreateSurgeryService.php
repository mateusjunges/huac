<?php

namespace HUAC\Services;

use HUAC\Models\Log;
use HUAC\Models\Patient;
use HUAC\Models\Surgery;

class CreateSurgeryService
{
    public function store($request)
    {
        $patient = Patient::create($request->all());
        $surgery = Surgery::create($request->all());

        return $surgery;
    }
}
