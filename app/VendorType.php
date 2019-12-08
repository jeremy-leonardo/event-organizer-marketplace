<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorType extends Model
{
    protected $table = 'vendor_type';
    protected $primaryKey = 'vendor_type_id';
    public $timestamps = true;
}
