<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */


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
        Log::info('Store room function reached');
        $creditBeforeBooking = User::where('user_id',$user_id)->value('credit');
        $roomDepositCost = Room::where('room_id',$room_id)->value('deposit_cost');
        $roomDepositNeeded = Room::where('room_id',$room_id)->value('require_deposit');
        Log::info('Key data grabbed');

        Log::info('Grabbing date');
        $date = $request->input('date');
        $timeStart = new Carbon($request->input('timeStart'));
        $timeEnd = new Carbon($request->input('timeEnd'));

        Log::info('Logic calculations');
        $hoursRoomBooked = $timeStart->diff($timeEnd)->format('%H');
        $existingBookings = Booking::where('room_id', $room_id)
            ->where('date', $date)
            ->get();

        Log::info('Logic for if room booked check');
        foreach ($existingBookings as $booking) {
            $existingStart = new Carbon($booking->timeStart);
            $existingEnd = new Carbon($booking->timeEnd);
    
            if ($timeStart < $existingEnd && $timeEnd > $existingStart) {
                Log::info('Room already booked in timeslot');
                return redirect('dashboard')->with('error', 'This room is already booked for the selected time.');
            }
        }

        if($roomDepositNeeded == false){
            Log::info('Store with no deposit method reached');
            Booking::create([
                'user_id'=> $user_id,
                'room_id' => $room_id,
                'date'=> $date,
                'timeStart'=> $timeStart,
                'timeEnd'=> $timeEnd,
                'hoursRoomBooked'=>$hoursRoomBooked,
            ]);
            Log::info('Stored info correctly');
            return redirect('dashboard')->with('status','Booking created successfully');
        } 
        else{
            $creditAfterBooking =  $creditBeforeBooking - $roomDepositCost;
            if($creditAfterBooking < 0){

                return redirect('dashboard')->with('error','please add more credits too book this room');

            }
            else{
                Log::info('Store method for requring deposit reached');
                Booking::create([
                    'user_id'=> $user_id,
                    'room_id' => $room_id,
                    'date'=>$date,
                    'timeStart'=> $timeStart,
                    'timeEnd'=> $timeEnd,
                    'hoursRoomBooked'=>$hoursRoomBooked,
                ]);
                Log::info('User data stored correctly ');
                User::where('user_id',$user_id)
                    ->update([
                    'credit'=> $creditAfterBooking,
                ]);
                Log::info('Account credits updated');
                Log::info('Stored info correctly');
                return redirect('dashboard')->with('status','Booking created successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($room_id)
    {
        $room = Room::find($room_id);
        $bookings = Booking::where('room_id',$room_id)->first();
        return view('bookingsystem.bookings.show',compact('bookings','room'));
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
        $timeStart = new Carbon($request->input('timeStart'));
        $timeEnd = new Carbon($request->input('timeEnd'));
        
        $hoursRoomBooked = $timeStart->diff($timeEnd)->format('%H');
        
        $data = [
            'user_id'=> $request->user_id,
            'room_id'=> $request->room_id,
            'date' => $date,
            'timeStart'=> $timeStart,
            'timeEnd'=> $timeEnd,
            'hoursRoomBooked'=>$hoursRoomBooked,
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
