<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';
    protected $primaryKey = 'package_id';
    public $timestamps = true;

    protected $fillable = 
    [
        'vendor_id', 
        'package_name', 
        'package_price', 
        'package_description',
        'package_is_active',
    ];

}
