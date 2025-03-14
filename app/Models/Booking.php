<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'user_id',
        'room_id',
        'date',
        'timeStart',
        'timeEnd',
        'hoursRoomBooked',
    ];
}
