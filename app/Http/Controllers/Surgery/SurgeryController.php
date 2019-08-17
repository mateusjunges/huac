<?php

namespace HUAC\Http\Controllers\Surgery;

use HUAC\Exceptions\ViewNotFoundException;
use HUAC\Http\Controllers\Controller;
use HUAC\Http\Requests\SurgerySchedulingRequest;
use HUAC\Models\Anesthesia;
use HUAC\Models\Procedure;
use HUAC\Models\Surgeon;
use HUAC\Models\Surgery;
use HUAC\Models\SurgeryClassification;
use HUAC\Services\CreateSurgeryService;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surgeries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
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
        }catch (\Exception $exception){
            if ($exception instanceof InvalidArgumentException)
                return ViewNotFoundException::forView();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurgerySchedulingRequest $request)
    {
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgery $surgery)
    {
        $procedures = Procedure::all();
        $classifications = SurgeryClassification::all();
        $anesthetics = Anesthesia::all();
        $surgeons = Surgeon::all();

        return view('surgeries.edit')->with([
            'procedures'      => $procedures,
            'classifications' => $classifications,
            'anesthetics'     => $anesthetics,
            'surgeons'        => $surgeons,
            'surgery'         => $surgery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
