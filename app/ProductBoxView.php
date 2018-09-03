<?php

namespace App;

use App\Storage;
use Illuminate\Database\Eloquent\Model;
use SahusoftCom\EloquentImageMutator\EloquentImageMutatorTrait;

class ProductBoxView extends Model
{

    use EloquentImageMutatorTrait;

    protected $image_fields = ['url_box_view'];

    public function subBrand()
    {
        return $this->belongsTo('App\SubBrand');
    }

    public function storage(){
        return $this->belongsTo(\App\Storage::class, 'view_info', 'id');
    }

    protected $fillable = [
        'subBrand_id',
        'url_box_view'
    ];
}
