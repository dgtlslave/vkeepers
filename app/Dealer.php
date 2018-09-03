<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    public function city()
    {
        return $this->belongsTo(\App\City::class, 'city_id', 'id');
    }

    public function profile()
    {
        return $this->belongsTo(\App\DealerProfile::class,'dealer_profiles_id','id');
    }

    public function visit(){
        return $this->belongsTo(\App\Visit::class, 'dealer_id', 'id');
    }
}
