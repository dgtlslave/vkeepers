<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductBoxView;

class LineController extends Controller
{
    public function showForm()
    {
        return view('dashboard.boxline');
    }

    public function getBox(Request $request)
    {
         dd(ProductBoxView::where('subBrand_id', '=', $request->box)->with('picture')->get());    
    }
}
