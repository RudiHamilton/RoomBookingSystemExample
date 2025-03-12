<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Controllers\Middleware;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){ 
        $this->middleware('permission:create bookings',options: ['only'=>['create','store']]);
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('bookingsystem.bookings.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,$room_id)
    {

        $user = $request->user();
        $room = Room::find($room_id);

        return view('bookingsystem.bookings.create',compact('user','room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$user_id,$room_id)
    {
        $creditBeforeBooking = User::where('user_id',$user_id)->value('credit');
        $roomDepositCost = Room::where('room_id',$room_id)->value('deposit_cost');

        $creditAfterBooking =  $creditBeforeBooking - $roomDepositCost;

        if($creditAfterBooking < 0){
            return redirect('dashboard')->with('status','please add more credits too book this room');
        }else{
            $date = $request->input('date');
            $time = $request->input('time');
            $time = $time.':00';
            $date = $date.' '.$time;

            Booking::create([
                'user_id'=> $user_id,
                'room_id' => $room_id,
                'date'=> $date,
            ]);
            User::where('user_id',$user_id)
                ->update([
                'credit'=> $creditAfterBooking,
            ]);
            return redirect('dashboard')->with('status','Booking created successfully');
        }
        // //dd($creditAfterBooking);
        // Booking::create([
        //     'user_id'=> $user_id,
        //     'room_id' => $room_id,
        //     'date'=> $date,
        // ]);
        // User::where('user_id',$user_id)
        //     ->update([
        //     'credit'=> $creditAfterBooking,
        // ]);
        // return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, String $id)
    {
        $bookings = Booking::findOrFail($id);
        $users = User::all();
        $rooms = Room::all();
        return view('bookingsystem.bookings.edit',compact('bookings','users','rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$booking_id)
    {
        $date = $request->input('date');
        $time = $request->input('time');
        $time = $time.':00';
        $date = $date.' '.$time;
        
        $data = [
            'user_id'=> $request->user_id,
            'room_id'=> $request->room_id,
            'date'=> $date,
        ];
        Booking::where('booking_id',$booking_id)->update($data);
        return redirect('bookings')->with('success','Booking updated correctly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $booking->delete();
        return redirect('bookings')->with('status','Booking deleted successfully');
    }
}
