<?php

namespace App\Http\Controllers;

use App\User;
use App\Visit;
use App\Plan;
use App\Storage;
use App\ProductBoxView;
use App\Workbench;
use App\Dealer;
use App\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{

    public function saveVisit(Request $request)
    {   
        if($request->position){
            
            $id = Auth::user()->id; 
            
            $visit = Visit::create([
                'user_id' => $id,
                'dealer_id' => $request->selected_dealer['id'],
                'plan_id' => 1,
                'successfuly_visit' => $request->success,
                'time_start_visit' => $request->startTime,
                'time_end_visit' => $request->endTime
            ]);

            foreach($request->position as $key => $position){
                
                $storages = [];
                foreach($position as $pos)
                if(count($pos)){
                    $storage = new Storage([
                    'view_info'=> $pos['picture']['id'],
                    'line_order' => $key
                ]);
                $storages[] = $storage;
            }
                $visit->storage()->saveMany($storages);
            }
        }
    }

    public function getVisit(Visit $visit){
        return view('dashboard.view', compact('visit'));
    }

    public function getCurrentVisit(Request $request){
        return Storage::select('view_info','line_order')->where('visit_id', '=', $request->visitId)->with('pbv')->get();
    }

    public function deleteUserVisit(Visit $visit){
        if(Visit::destroy($visit->id)){
            return 1;
        }
    }

}
