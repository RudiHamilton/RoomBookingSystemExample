<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('bookingsystem.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookingsystem.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $request->validated();
        Room::create([
            'name'=> $request->name,
            'type'=> $request->type,
            'capacity'=> $request->capacity,
            'require_deposit'=> $request->require_deposit,
            'deposit_cost'=> $request->depost_cost,
        ]);
        
        return redirect('rooms')->with('success','Room stored correctly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $rooms = Room::findOrFail($id);
        return view('bookingsystem.rooms.edit',compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($room_id)
    {
        $room = Room::findOrFail($room_id);
        $room->delete();
        return redirect('rooms')->with('status','Room deleted successfully');
    }
}
