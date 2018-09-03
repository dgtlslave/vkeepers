<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Region extends Model
{

    public function state()
    {
        return $this->hasMany(App\State::class);
    }

    protected $fillable = [
        'name'
    ];
}
