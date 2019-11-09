<?php

namespace HUAC\Http\Controllers\Surgeons;

use HUAC\Http\Requests\SurgeonsRequest;
use HUAC\Models\Surgeon;
use HUAC\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SurgeonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Gate::denies('surgeons.index')) {
            $message = array(
                'type' => 'warning',
                'title' => 'Acesso negado!',
                'text' => 'Você não tem permissão para acessar esta área do sistema!'
            );
            session()->flash('message', $message);

            return redirect()->back();
        }

        $surgeons = Surgeon::all();

        return view('surgeons.index', [
            'surgeons' => $surgeons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Gate::denies('surgeons.store')) {
            $message = array(
                'type' => 'warning',
                'title' => 'Acesso negado!',
                'text' => 'Você não tem permissão para acessar esta área do sistema!'
            );
            session()->flash('message', $message);

            return redirect()->back();
        }

        $users = User::all();

        return view('surgeons.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(SurgeonsRequest $request)
    {
        if (Gate::denies('surgeons.store')) {
            $message = array(
                'type' => 'warning',
                'title' => 'Acesso negado!',
                'text' => 'Você não tem permissão para realizar esta ação no sistema!'
            );
            session()->flash('message', $message);

            return redirect()->back();
        }

        $surgeon = Surgeon::create($request->all());

        return redirect()->route('surgeons.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Surgeon $surgeon)
    {
        if (Gate::denies('surgeons.update')) {
            $message = array(
                'type' => 'warning',
                'title' => 'Acesso negado!',
                'text' => 'Você não tem permissão para realizar esta ação no sistema!'
            );
            session()->flash('message', $message);

            return redirect()->back();
        }
        $users = User::all();

        return view('surgeons.edit', [
            'surgeon' => $surgeon,
            'users'   => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SurgeonsRequest $request
     * @param Surgeon $surgeon
     * @return void
     */
    public function update(SurgeonsRequest $request, Surgeon $surgeon)
    {
        if (Gate::denies('surgeons.update')) {
            $message = array(
                'type' => 'warning',
                'title' => 'Acesso negado!',
                'text' => 'Você não tem permissão para realizar esta ação no sistema!'
            );
            session()->flash('message', $message);

            return redirect()->back();
        }

        $surgeon->update($request->all());
        $surgeon->save();

        $message = array(
            'type'  => 'success',
            'title' => 'Sucesso!',
            'text'  => 'Médico atualizado com sucesso!'
        );

        session()->flash('message', $message);

        return redirect()->route('surgeons.index');
    }
}
