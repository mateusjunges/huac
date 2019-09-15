<?php

namespace HUAC\Services;

use HUAC\Events\SurgeryCreated;
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

        $surgery->attachAnesthetics($request->input('anesthesia_id'));

        Log::surgeryCreated($surgery);

        event(new SurgeryCreated($surgery));

        return $surgery;
    }

    /**
     * Update the specified surgery.
     * @param Request $request
     * @param $surgery
     * @return mixed
     */
    public function update(Request $request, $surgery)
    {
        $patient = Patient::find($surgery->patient_id);
        $patient->update($request->all());
        $patient->save();

        $surgery->update($request->all());
        $surgery->save();

        $surgery->assignHeadSurgeon(Surgeon::find($request->input('head_surgeon')));

        if ($request->input('assistant_surgeon') != 0)
            $surgery->assignAssistantSurgeon(Surgeon::find($request->input('assistant_surgeon')));

        $surgery->syncAnesthetics($request->input('anesthesia_id'));

        Log::createFor(
            $surgery,
            'Dados da cirurgia atualizados!',
            $surgery->latestStatus()->first()->status_id
        );

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
