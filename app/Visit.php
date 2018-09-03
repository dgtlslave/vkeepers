<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'user_id',
        'dealer_id',
        'plan_id',
        'successfuly_visit',
        'time_start_visit',
        'time_end_visit',
        'view_info',
        'storage_id'
    ];

    public function storage()
    {
        return $this->hasMany(\App\Storage::class, 'visit_id', 'id');
    }

    public function dealer(){
        return $this->hasOne(\App\Dealer::class, 'id', 'dealer_id')->with('city', 'profile');
    }
    
}
