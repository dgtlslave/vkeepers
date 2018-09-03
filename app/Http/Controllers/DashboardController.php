<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Profile;
use App\Visit;
use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDash()
    {
        return view('dashboard.dashboard');
    }

    public function getUserData() 
    {
        // dd($request->user()->id);
        $profile = "";
        if(Profile::where('user_id', auth()->user()->id)->first()){
            return $profile = Profile::where('user_id', auth()->user()->id)
                    ->leftJoin('users', 'profiles.user_id', '=', 'users.id')
                    ->select(
                        'users.id',
                        'users.firstname',
                        'users.lastname',
                        'profiles.function',
                        'profiles.city_id',
                        'profiles.image'
                    )->first();         
        } else {
            return "Current user doesn't exist";
        }
    }

    public function getUserVisit(){
        return Visit::where('user_id', auth()->user()->id)->with('storage', 'dealer')->get();
    }
}
