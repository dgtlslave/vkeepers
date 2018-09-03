<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    public function showForm()
    {
        return view('options.options_unit.unit_region');
    }
   
    public function getData()
    {
        return $region = Region::all();
    }

    public function regionAddData(Request $request)
    {
        if($request->add){
            $region = Region::create([
                'name' => $request->add
            ]);
            
            return 1;
        }
    }

    public function regionUpdateData(Request $request)
    {
        if($request->up_to && $request->up_at){
            $region = Region::find($request->up_at);
            $region->name = $request->up_to;
            $region->save();

            return 1;
        }
    }

    public function regionDeleteData(Request $request)
    {
        if($request->delete){
            $region = Region::find($request->delete);
            $region->delete();

            return 1;
        }
    }


}
