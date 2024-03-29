<?php

namespace HUAC\Http\Controllers\Procedures;

use HUAC\Http\Requests\ProcedureRequest;
use HUAC\Models\Procedure;
use HUAC\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class ProceduresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Gate::denies('procedures.index')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('procedures.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Gate::denies('procedures.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('procedures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProcedureRequest $request
     * @return void
     */
    public function store(ProcedureRequest $request)
    {
        if (Gate::denies('procedures.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $procedure = Procedure::create($request->all());

        $message = array(
            'type'  => 'success',
            'title' => 'Sucesso!',
            'text'  => 'Procedimento adicionado com sucesso!',
        );

        session()->flash('message', $message);

        return redirect()->route('procedures.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Procedure $procedure
     * @return void
     */
    public function edit(Procedure $procedure)
    {
        if (Gate::denies('procedures.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('procedures.edit')->with([
            'procedure' => $procedure
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProcedureRequest $request
     * @param Procedure $procedure
     * @return void
     */
    public function update(ProcedureRequest $request, Procedure $procedure)
    {
        if (Gate::denies('procedures.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $procedure->update($request->all());

        $message = array(
            'type'  => 'success',
            'title' => 'Sucesso!',
            'text'  => 'Procedimento atualizado com sucesso!',
        );

        session()->flash('message', $message);

        return redirect()->route('procedures.index');
    }
}
