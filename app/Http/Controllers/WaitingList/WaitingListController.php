<?php

namespace HUAC\Http\Controllers\WaitingList;

use HUAC\Http\Requests\SurgeryRequest;
use HUAC\Models\Anesthesia;
use HUAC\Models\Procedure;
use HUAC\Models\Surgeon;
use HUAC\Models\Surgery;
use HUAC\Models\SurgeryClassification;
use HUAC\Services\WaitingListService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WaitingListController
{
    /**
     * @var WaitingListService
     */
    private $waiting_list_service;

    /**
     * WaitingListController constructor.
     * @param WaitingListService $waiting_list_service
     */
    public function __construct(WaitingListService $waiting_list_service)
    {
        $this->waiting_list_service = $waiting_list_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('waiting-list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $procedures = Procedure::all();
        $surgeons = Surgeon::all();
        $anesthetics = Anesthesia::all();
        $classifications = SurgeryClassification::all();

        return view('waiting-list.create')->with([
            'procedures' => $procedures,
            'surgeons' => $surgeons,
            'anesthetics' => $anesthetics,
            'classifications' => $classifications
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SurgeryRequest $request
     * @return void
     */
    public function store(SurgeryRequest $request)
    {
        $surgery = $this->waiting_list_service->store($request);

        $message = array(
            'title' => 'Sucesso!',
            'text'  => 'Cirurgia adicionada com sucesso!',
            'type'  => 'success'
        );

        session()->flash('message', $message);

        return redirect()->route('waiting-list.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $surgery
     * @return Response
     */
    public function edit($surgery)
    {
        $procedures = Procedure::all();
        $surgeons = Surgeon::all();
        $anesthetics = Anesthesia::all();
        $classifications = SurgeryClassification::all();
        $surgery = Surgery::find($surgery);
        $patient = $surgery->patient()->first();

        return view('waiting-list.edit')->with([
            'procedures' => $procedures,
            'surgeons' => $surgeons,
            'anesthetics' => $anesthetics,
            'surgery' => $surgery,
            'classifications' => $classifications,
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $surgery
     * @return Response
     */
    public function update(Request $request, $surgery)
    {
        $surgery = Surgery::find($surgery);
        $surgery = $this->waiting_list_service->update($request, $surgery);

        return redirect()->route('waiting-list.index');
    }
}
