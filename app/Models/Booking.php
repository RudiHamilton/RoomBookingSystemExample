<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'user_id',
        'room_id',
        'date',
    ];
}
