<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $table = 'booking_detail';
    protected $primaryKey = 'booking_detail_id';
    public $timestamps = true;
}
