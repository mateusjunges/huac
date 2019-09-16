<?php

namespace HUAC\Http\Controllers\SurgicalRoom;

use Exception;
use HUAC\Exceptions\ViewNotFoundException;
use HUAC\Http\Requests\SurgicalRoomRequest;
use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;
use Carbon\Carbon;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

class SurgicalRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('rooms.create');
        }catch (Exception $exception){
            if ($exception instanceof InvalidArgumentException)
                return ViewNotFoundException::forView();
        }
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
            'title' => trans('huac.success'),
            'text'  => trans('huac.user_saved_successfully'),
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
            'title' => trans('huac.success'),
            'text' => trans('huac.user_updated_successfully'),
        );
        session()->flash('message', $message);

        return redirect()->route('rooms.index');
    }
}
