<?php

namespace HUAC\Http\Controllers\Surgeries;

use Exception;
use HUAC\Exceptions\ViewNotFoundException;
use HUAC\Http\Controllers\Controller;
use HUAC\Http\Requests\SurgeryRequest;
use HUAC\Models\Anesthesia;
use HUAC\Models\Patient;
use HUAC\Models\Procedure;
use HUAC\Models\Surgeon;
use HUAC\Models\Surgery;
use HUAC\Models\SurgeryClassification;
use HUAC\Services\CreateSurgeryService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use InvalidArgumentException;

class SurgeryController extends Controller
{

    /**
     * @var CreateSurgeryService
     */
    private $surgeryService;

    public function __construct(CreateSurgeryService $surgeryService)
    {

        $this->surgeryService = $surgeryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('surgeries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        try{
            if (Gate::denies('surgeries.create')) {
                $message = array(
                    'title' => 'Acesso negado!',
                    'text' => 'Você não possui permissão para acessar esta área do sistema!',
                    'type' => 'warning',
                );
                session()->flash('message', $message);
                return redirect()->back();
            }

            $procedures = Procedure::all();
            $classifications = SurgeryClassification::all();
            $anesthetics = Anesthesia::all();
            $surgeons = Surgeon::all();

            return view('surgeries.create')->with([
                'procedures'      => $procedures,
                'classifications' => $classifications,
                'anesthetics'     => $anesthetics,
                'surgeons'        => $surgeons
            ]);
        }catch (Exception $exception){
            if ($exception instanceof InvalidArgumentException)
                return ViewNotFoundException::forView();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SurgeryRequest $request
     * @return Response
     */
    public function store(SurgeryRequest $request)
    {
        if (Gate::denies('surgeries.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $surgery = $this->surgeryService->store($request);

        $message = array(
            'title' => 'Sucesso!',
            'text'  => 'Cirurgia adicionada com sucesso!',
            'type'  => 'success'
        );

        session()->flash('message', $message);

        return redirect()->route('surgeries.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Surgery $surgery
     * @return Response
     */
    public function edit(Surgery $surgery)
    {
        if (Gate::denies('surgeries.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $procedures = Procedure::all();
        $classifications = SurgeryClassification::all();
        $anesthetics = Anesthesia::all();
        $surgeons = Surgeon::all();
        $patient = Patient::find($surgery->patient_id);

        return view('surgeries.edit')->with([
            'procedures'      => $procedures,
            'classifications' => $classifications,
            'anesthetics'     => $anesthetics,
            'surgeons'        => $surgeons,
            'surgery'         => $surgery,
            'patient'         => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SurgeryRequest $request
     * @param Surgery $surgery
     * @return Response
     */
    public function update(SurgeryRequest $request, Surgery $surgery)
    {
        if (Gate::denies('surgeries.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $surgery = $this->surgeryService->update($request, $surgery);

        return redirect()->route('surgeries.index');
    }
}
