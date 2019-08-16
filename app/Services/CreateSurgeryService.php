<?php

namespace HUAC\Services;

use HUAC\Models\Log;
use HUAC\Models\Patient;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;

class CreateSurgeryService
{
    public function store(Request $request)
    {
        Patient::create($request->all());
        $surgery = Surgery::create($request->all());

        return $surgery;
    }
}
