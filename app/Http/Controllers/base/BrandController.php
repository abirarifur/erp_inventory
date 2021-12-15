<?php

namespace App\Http\Controllers\base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBrands = Brand::all()->reject(function ($user) {
            return $user->status === 0;
        });
        return $allBrands;
        // return [
        //     'success' => true,
        //     'allBrands'=> $allBrands
        // ];
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
        $newBrand = Brand::create([
            'brand_code' => $request->brand_code,
            'brand_name' => $request->brand_name,
            'company_id' => $request->company_id,
            'created_by' => $request->created_by,
            'system_ip' => $request->system_ip
        ]);
        return [
            'success' => true,
            'message' => 'Brand Created Successfully.'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singleBrand = Brand::where('brand_code', $id)->firstOrFail();
        return $singleBrand;
        // return [
        //     'success' => true,
        //     'singleBrand'=> $singleBrand
        // ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
