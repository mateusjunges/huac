<?php

namespace HUAC\Http\Controllers\Room;

use HUAC\Http\Requests\RoomsRequest;
use HUAC\Models\Room;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class RoomsController extends Controller
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
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomsRequest $request)
    {
        $room = Room::create($request->all());
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
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
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
    public function update(Request $request, Room $room)
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
