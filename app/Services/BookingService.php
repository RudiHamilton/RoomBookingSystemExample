<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class BookingService{
    
    //,Room $room,Booking $booking)
    public function addBooking(Request $request,User $user){

        
        $user = $request->user();
        
        dd($user);

    }
}