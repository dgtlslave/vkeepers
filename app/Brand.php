<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $fillable = [
        'name'
    ];

    public function subBrand()
    {
        return $this->hasMany(SubBrand::class);    
    }

    public function imagerelation()
    {
        return $this->hasMany(SubBrand::class, 'brand_id', 'id')->with('picture');
    }
}
