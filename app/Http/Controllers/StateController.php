<?php

namespace App\Http\Controllers;

use App\State;
use App\Region;
use Illuminate\Http\Request;

class StateController extends Controller
{
  
    public function getStateData()
    {
        return $state = State::all();
    }

    public function getRegionData()
    {
        return $region = Region::all();
    }

    public function showForm()
    {
        return view('options.options_unit.unit_state');
    }

    public function stateAddData(Request $request)
    {
        if($request->add_new && $request->current_region){
            $addRegion = State::create([
                'region_id' => $request->current_region,
                'name' => $request->add_new
            ]);

            return 1;
        }
    }

    public function stateUpdateData(Request $request)
    {
        if($request->current_region && $request->current_state && $request->update_state){
            $up_state = State::where([
                'region_id' => $request->current_region,
                'id' => $request->current_state 
            ])->first();
            $up_state->name = $request->update_state;
            $up_state->save();

            return 1;
        }
    }

    public function stateDeleteData(Request $request)
    {
        if($request->current_region && $request->delete_state){
            $del_state = State::where([
                'region_id' => $request->current_region,
                'id' => $request->delete_state 
            ])->first();
            $del_state->delete();

            return 1;
        }
    }

    public function filteredState(Request $request){
        return State::where('region_id', '=', $request->region)->get();
    }

    public function filteredStateDel(Request $request){
        return State::where('region_id', '=', $request->region)->get();
    }
}
