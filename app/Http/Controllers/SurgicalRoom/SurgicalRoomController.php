<?php

namespace HUAC\Http\Controllers\SurgicalRoom;

use HUAC\Http\Requests\SurgicalRoomRequest;
use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;
use Carbon\Carbon;
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
        }catch (\Exception $exception){
            if ($exception instanceof InvalidArgumentException)
                return ViewNotFoundException::forView();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurgicalRoomRequest $request)
    {
        if (!is_null($request->input('morning_reservation_starts_at')))
            $request->request->set(
                'morning_reservation_starts_at',
                Carbon::parse($request->input('morning_reservation_starts_at'))->format('H:m:s')
            );
        if (!is_null($request->input('morning_reservation_ends_at')))
            $request->request->set(
                'morning_reservation_ends_at',
                Carbon::parse($request->input('morning_reservation_ends_at'))->format('H:m:s')
            );
        if (!is_null($request->input('afternoon_reservation_starts_at')))
            $request->request->set(
                'afternoon_reservation_starts_at',
                Carbon::parse($request->input('afternoon_reservation_starts_at'))->format('H:m:s')
            );
        if (!is_null($request->input('afternoon_reservation_ends_at')))
            $request->request->set(
                'afternoon_reservation_ends_at',
                Carbon::parse($request->input('afternoon_reservation_ends_at'))->format('H:m:s')
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
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(SurgicalRoom $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
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
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json([
           'code'  => Response::HTTP_OK,
           'title' => trans('huac.success'),
           'text'  => trans('huac.successfully_deleted'),
           'icon'  => 'success',
           'timer' => 5000,
        ]);
    }
}
