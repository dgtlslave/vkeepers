<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function region()
    {
        return $this->belongsTo(App\Region::class);
    }

    public function city()
    {
        return $this->hasMany(App\City::class);
    }

    protected $fillable = [
        'region_id',
        'name'
    ];
}
