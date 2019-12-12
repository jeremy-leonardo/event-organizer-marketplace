<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $table = 'booking_detail';
    protected $primaryKey = 'booking_detail_id';
    public $timestamps = true;

    protected $fillable = 
    [
        'booking_id', 
        'package_id', 
        'booking_detail_description', 
        'booking_detail_is_confirmed', 
        'booking_detail_price', 
    ];

}
