<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\Option;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class OptionController extends Controller
{
    public function showForm()
    {
        return view('options.options');
    }

    // public function showBrands()
    // {
    //     return view('options.options_unit.options_unit');
    // }
}
