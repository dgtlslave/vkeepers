<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showBrands()
    {
        return view('options.options_unit.unit_brand');
    }

    public function updateData(Request $request)
    {
        if($request->up_to && $request->up_at){
            $brand = Brand::find($request->up_to);
            $brand->name = $request->up_at;
            $brand->save();
            return 1;
        } 
    }

    public function addData(Request $request)
    {
        if($request->add)
        {
            $newBrand = Brand::create(['name' => $request->add]);
            return 1;    
        }
    }

    public function deleteData(Request $request)
    {   
        if($request->delete){
            $deleteBrand = Brand::find($request->delete);
            $deleteBrand->delete();
            return 1;
        }
    }

    public function createUnit(Request $request)
    {
        Brand::unit();
        \Session::flash('unit', 'Unit created successfully');
        return redirect('/options');
    }

    public function getAllData()
    {
        return $brand = Brand::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
