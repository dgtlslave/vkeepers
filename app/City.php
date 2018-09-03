<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function dealer()
    {
        return $this->hasOne(App\Dealer::class, 'id', 'city_id');
    }

    public function state()
    {
        return $this->belongsTo(App\State::class);
    }

    protected $fillable = [
        'state_id',
        'name'
    ];
}
