<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{ 
    use Notifiable;
    protected $guard='client';
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'blood_type_id', 'password', 'name', 'dob', 'pin_code', 'city_id', 'last_donation_date','is_activate');

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function donationOrders()
    {
        return $this->hasMany('App\Models\DonationOrder');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany('App\Models\Notification', 'clientable');
    }

    public function bloodTypes()
    {
        return $this->morphedByMany('App\Models\BloodType', 'clientable');
    }

    public function governorates()
    {
        return $this->morphedByMany('App\Models\Governorate', 'clientable');
    }
    protected $hidden = [
        'password', 'api_token',
    ];
}