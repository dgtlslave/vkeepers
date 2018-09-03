<?php

namespace App;

use App\Brand;
use App\ProductBoxView;

use Illuminate\Database\Eloquent\Model;

class SubBrand extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function picture()
    {
        return $this->hasOne(ProductBoxView::class, 'subBrand_id', 'id');
    }

    protected $fillable = [
        'brand_id',
        'name'
    ];
}
