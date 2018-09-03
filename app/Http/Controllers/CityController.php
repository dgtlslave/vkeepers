<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Region;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function getData()
    {
        return $city = City::all();
    }

    public function showForm()
    {
        return view('options.options_unit.unit_city');
    }

    public function filteredRegionForCity(Request $request){
        return State::where('region_id', '=', $request->region)->get();
    }

    
}
