<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'function',
        'city_id',
        'phone',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'id', 'user_id');
    }
}
