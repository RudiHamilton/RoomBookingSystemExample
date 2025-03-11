<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;
    protected $primaryKey = 'room_id';

    protected $fillable = [
        'name',
        'type',
        'capacity',
        'require_deposit',
        'deposit_cost',
    ];
}
