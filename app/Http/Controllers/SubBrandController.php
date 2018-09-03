<?php

namespace App\Http\Controllers;

use App\SubBrand;
use App\Brand;
use Illuminate\Http\Request;

class SubBrandController extends Controller
{
    public function showForm()
    {
        return view('options.options_unit.unit_subbrand');
    }    

    public function getBrandsData() 
    {
        return $brand = Brand::all();
    }

    public function getSubbrandsData()
    {
        return $subBrand = SubBrand::all();
    }

    public function add(Request $request)
    {
        if($request->current_brand && $request->add_new){
            $subBrand = SubBrand::create([
                'brand_id' => $request->current_brand, 
                'name' => $request->add_new
            ]);
            return 1;
        }
    }

    public function update(Request $request)
    {
        if($request->update_subbrand && $request->current_brand && $request->current_subbrand)
        {
            $up_subBrand = SubBrand::where([
                'id' => $request->current_subbrand,
                'brand_id' => $request->current_brand
            ])->first();

            $up_subBrand->name = $request->update_subbrand;
            $up_subBrand->save();
            return 1;
        }
    }

    public function delete(Request $request)
    {
        if($request->current_brand && $request->delete_subbrand)
        {
            $del_subbrand = SubBrand::where([
                'id' => $request->delete_subbrand,
                'brand_id' => $request->current_brand
            ]);
            $del_subbrand->delete();
            return 1;
        }
    }

    public function filteredSubBrand(Request $request){
        return SubBrand::where('brand_id', '=', $request->brand)->get();
    }

    public function filteredSubBrandDel(Request $request){
        return SubBrand::where('brand_id', '=', $request->brand)->get();
    }
}























