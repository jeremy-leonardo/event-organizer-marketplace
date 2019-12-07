<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    protected $guard = 'vendor';
    protected $table = 'vendor';
    protected $primaryKey = 'vendor_id';
    public $timestamps = true;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_name', 'vendor_email', 'vendor_password', 'vendor_type_id', 'vendor_is_active', 'vendor_phone_number', 'city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'vendor_password', 'remember_token', 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->vendor_password;
    }
}
