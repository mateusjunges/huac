<?php

namespace HUAC\Http\Controllers\WaitingList;

use HUAC\Models\Anesthesia;
use HUAC\Models\Procedure;
use HUAC\Models\Surgeon;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;

class WaitingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('waiting-list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procedures = Procedure::all();
        $surgeons = Surgeon::all();
        $anesthetics = Anesthesia::all();

        return view('waiting-list.create')->with([
            'procedures' => $procedures,
            'surgeons' => $surgeons,
            'anesthetics' => $anesthetics
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $surgeons = Surgeon::all();
        $anesthetics = Anesthesia::all();

        return view('waiting-list.edit')->with([
            'procedures' => $procedures,
            'surgeons' => $surgeons,
            'anesthetics' => $anesthetics,
            'surgery' => $surgery
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
