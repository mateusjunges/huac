<?php

namespace HUAC\Services;

use HUAC\Models\Log;
use HUAC\Models\Patient;
use HUAC\Models\Surgeon;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;

class CreateSurgeryService
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $patient = $this->createPatient($request);

        $surgery = Surgery::create(
            array_merge(
                $request->all(),
                ["patient_id" => $patient->id]
            )
        );

        $surgery->assignHeadSurgeon(Surgeon::find($request->input('head_surgeon')));

        if ($request->input('assistant_surgeon') != 0)
            $surgery->assignAssistantSurgeon(Surgeon::find($request->input('assistant_surgeon')));

        Log::surgeryCreated($surgery);

        return $surgery;
    }

    /**
     * @param $request
     * @return mixed
     */
    private function createPatient($request)
    {
        $patient = Patient::where("medical_record", $request->medical_record)->first();

        if ($patient != null)
            return $patient;
        else {
            $patient = Patient::create($request->all());
            return $patient;
        }
    }
}
