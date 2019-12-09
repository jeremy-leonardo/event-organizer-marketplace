<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';
    public $timestamps = true;

    protected $fillable = 
    [
        'user_id', 
        'booking_status_id', 
        'event_date', 
        'city_id', 
        'booking_description',
    ];
}
