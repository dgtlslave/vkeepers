<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealerProfile extends Model
{
    public function dealer() 
    {    
        return $this-> hasOne(App\Dealer::class);
    }

}
