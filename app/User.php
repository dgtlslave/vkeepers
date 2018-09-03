<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'firstname', 
        'lastname',
        'email',
        'password'
    ];

    protected $hidden =[
        'password', 
        'remember_token'
    ];

    public function profile(){
        return $this->hasOne(\App\Profile::class, 'user_id', 'id');
    }
}
