<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\State;
use App\ProductBoxView;
use App\Brand;
use App\SubBrand;
use App\City;
use App\Dealer;
use App\Profile;
use App\DealerProfile;

class GetRegularDataController extends Controller
{
    
    public function getBrand()
    {
        return $brand = Brand::with('imagerelation')->get();
    }

    public function getSubBrand(Request $request)
    {
        // dd($request->subbrand);
        if($request->subbrand){
            return SubBrand::where('brand_id', $request->subbrand)->with('picture')->get();
        } else {
            return null;
        }
    }

    public function getSubBrandDel(Request $request)
    {
        if($request->subbrandDel){
            return SubBrand::where('brand_id', $request->subbrandDel)->get();
        } else {
            return null;
        }
    }

    // public function getBoxView(Request $request)
    // {
        
    // }

    public function getRegion()
    {
        return Region::all();
    }

    public function getState(Request $request)
    {
        return State::where('region_id', '=', $request->region)->get();
    }

    public function getCity(Request $request)
    {
        return City::where('state_id', '=', $request->state)->get();    
    }

    public function getDealer()
    {
        return Dealer::with('profile')->get();
    }
}
