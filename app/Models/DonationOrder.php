<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationOrder extends Model 
{

    protected $table = 'donation_orders';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_age', 'bags_number', 'blood_type_id', 'hospital_name', 'hospital_address', 'patient_phone', 'city_id', 'client_id', 'notes', 'longitude', 'latitude');

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}