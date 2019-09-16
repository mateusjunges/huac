<?php

namespace HUAC\Http\Controllers\SurgicalRoom;

use HUAC\Http\Requests\SurgicalRoomRequest;
use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;
use Carbon\Carbon;

class SurgicalRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = SurgicalRoom::all();

        return view('rooms.index')->with([
            'surgicalRooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SurgicalRoomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurgicalRoomRequest $request)
    {
        if (!is_null($request->input('morning_reservation_starts_at')))
            $request->request->set(
                'morning_reservation_starts_at',
                Carbon::parse($request->input('morning_reservation_starts_at'))->format('H:i:s')
            );
        if (!is_null($request->input('morning_reservation_ends_at')))
            $request->request->set(
                'morning_reservation_ends_at',
                Carbon::parse($request->input('morning_reservation_ends_at'))->format('H:i:s')
            );
        if (!is_null($request->input('afternoon_reservation_starts_at')))
            $request->request->set(
                'afternoon_reservation_starts_at',
                Carbon::parse($request->input('afternoon_reservation_starts_at'))->format('H:i:s')
            );
        if (!is_null($request->input('afternoon_reservation_ends_at')))
            $request->request->set(
                'afternoon_reservation_ends_at',
                Carbon::parse($request->input('afternoon_reservation_ends_at'))->format('H:i:s')
            );

        $room = SurgicalRoom::create($request->all());

        $message = array(
            'title' => 'Sucesso!',
            'text'  => 'Sala de cirurgia adicionada com sucesso!',
            'type'  => 'success',
        );
        session()->flash('message', $message);
        return redirect()->route('rooms.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SurgicalRoom $room
     * @return \Illuminate\Http\Response
     */
    public function edit(SurgicalRoom $room)
    {
        return view('rooms.edit')->with([
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SurgicalRoom $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurgicalRoom $room)
    {
        $room->update($request->all());
        $message = array(
            'type' => 'success',
            'title' => 'Sucesso!',
            'text' => 'Sala de cirurgia atualizada com sucesso!',
        );
        session()->flash('message', $message);

        return redirect()->route('rooms.index');
    }
}
