<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductBoxView;

class WorkbenchController extends Controller
{
    public function showForm()
    {
        return view('dashboard.workbench');
    }

    // public function getAddress(Request $request)
    // {
    //     dd($request);
    //     // return Dealer::where('id' => $request->)
    // }

}
