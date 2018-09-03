<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showForm()
    {
        return view('user.profile');
    }

    public function addProfile(Request $request)
    {
         $current_user = Auth::user();
            // dd($current_user->id);
         if((Profile::where('user_id', $current_user)->first()) == false){
            $profile = Profile::firstOrCreate(
                ['user_id'=>$current_user->id]
                ,[
                'user_id'=>$current_user->id,
                'function'=>$request->current_role,
                'city_id'=>$request->current_city,
                'phone'=>$request->phone,
                'image'=>'https://lorempixel.com/640/480/?82148'
            ]);
            
            // it's quite good idea to check if profile has been created
            if($profile){
                return ['user'=>Auth::user()->profile, 'direction'=>'/dashboard'];
            }
         } else {
            return 'Somthing wrong!';
         }
    }

    public function showProfileView()
    {
        return view('dashboard.profile_view');
    }

    public function getAllUserData()
    {
        $current_user = Auth::user();
        return Profile::where('user_id', '=', $current_user->id)->get();
    }

    public function getAuthUserData()
    {
        $user = Auth::user();
        return [$user, $user->profile];
    }
}


