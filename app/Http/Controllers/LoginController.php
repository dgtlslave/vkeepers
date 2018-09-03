<?php

namespace App\Http\Controllers;

use App\Login;
use App\Register;
use App\Profile;
use App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        
        $val = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        if(Auth::attempt([
            'email'=>$request->email, 
            'password'=>$request->password
        ])){
            return ['user'=>Auth::user(),'direction'=>$this->redirectLogedUser()];
        }else{
            return 0;
        }
    }

    public function redirectLogedUser()
    {
        $loged_user = Auth::user();
        
        if(Profile::where('user_id', '=', $loged_user->id)->first()){
            return '/dashboard';
        } else {
            return '/profile';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        \Session::flash('logout', 'You was logout');
        return redirect('/login');
    }
}
