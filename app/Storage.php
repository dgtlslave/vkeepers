<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'visit_id',
        'line_order',
        'view_info'
    ];
    
    public function visit()
    {
        return $this->belongTo(\App\Visit::class, 'id', 'visit_id');
    }

    public function pbv(){
        return $this->hasOne(\App\ProductBoxView::class, 'id', 'view_info');
    }
}

