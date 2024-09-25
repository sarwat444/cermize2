<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Reservation extends Model
{
    use HasFactory ;
    protected $guarded = ['id'];
    public  function event()
    {
        return  $this->belongsTo('\App\Models\event' , 'e_event_id' , 'id') ;
    }


    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d.m.Y');
    }

}
