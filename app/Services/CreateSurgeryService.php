<?php

namespace HUAC\Services;

use HUAC\Models\Log;
use HUAC\Models\Patient;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;

class CreateSurgeryService
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {   dd($request->all());
        Patient::create($request->all());

        $surgery = Surgery::create($request->all());

        $surgery->assignHeadSurgeon($request->head_surgeon);

        if (! is_null($request->input('assistant_surgeon')))
            $surgery->assignAssistantSurgeon($request->assitant_surgeon);

        Log::surgeryCreated($surgery);

        return $surgery;
    }
}
