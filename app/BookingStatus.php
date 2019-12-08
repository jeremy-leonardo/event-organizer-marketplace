<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    protected $table = 'booking_status';
    protected $primaryKey = 'booking_status_id';
    public $timestamps = true;
}
