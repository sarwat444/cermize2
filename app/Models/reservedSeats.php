<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservedSeats extends Model
{
    protected $fillable = ['seat_number', 'event_id', 'reservation_id'];
    use HasFactory;
}
