<?php

namespace App\Http\Controllers;

use App\ProductBoxView;
use App\Brand;
use App\SubBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductBoxViewController extends Controller
{
    
    public function showForm()
    {
        return view('options.options_unit.unit_box_view');
    }

    public function upload(Request $request)
    {   
        if($request->subbrand && $request->image){
            $pbv = ProductBoxView::create([
                'subBrand_id' => $request->subbrand,
                'url_box_view' => $request->image
            ]);
            $pbv->save();    
        }
        return 1;
    }

    public function delete(Request $request)
    {
        if($request->subbrand){
            $pbv = ProductBoxView::where('subBrand_id', '=', $request->subbrand)->delete();
        }
        return 1;
    }
    

    public function getBoxData()
    {
        return $boxes = ProductBoxView::all();
    }

    public function getBoxView(Request $request)
    {
        // dd($request->box);
        return ProductBoxView::where('subBrand_id', $request->box)->get();
    }
}

