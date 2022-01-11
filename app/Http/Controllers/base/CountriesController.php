<?php

namespace App\Http\Controllers\base;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCountries= Country::all();
        return response()->json(['allCountries'=>$allCountries], 201);
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
        $validated = Validator::make($request->all(),[
            "country_name"  => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/|unique:countries',
            "system_ip"     => 'required|string',
        ],);
        if ($validated->fails())
        {return $validated->errors();}
        $getLastCountry = Country::select('country_code')->orderBy('id', 'desc')->first();
        if($getLastCountry){
            $get_numbers = str_replace("CNT","",$getLastCountry->country_code);
            $increase_number = $get_numbers+1;
            $get_new_number = str_pad($increase_number,3,0,STR_PAD_LEFT);
            $country_code = "CNT".$get_new_number;
            Country::create([
                'country_code' => $country_code,
                'country_name' => request()->country_name,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
            $allCountries= Country::all();
            return response()->json(["success" => "Country Added Successfully",'allCountries'=>$allCountries], 201);
        }else{
            Country::create([
                'country_code' => "CNT001",
                'country_name' => request()->country_name,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
            $allCountries= Country::all();
            return response()->json(["success" => "Country Added Successfully",'allCountries'=>$allCountries], 201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getCountry = Country::find($id);
        if($getCountry){
            if($getCountry->status == 1){
                $getCountry->update([
                    'status'=>0
                ]);
            }else{
                $getCountry->update([
                    'status'=>1
                ]);
            }
            $allCountries= Country::all();
            return response()->json(["success" => "Country status changed",'allCountries'=>$allCountries], 201);
        }
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
        $validated = Validator::make($request->all(),[
            "country_name"  => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/|unique:countries,country_name,'.$id,
            "system_ip"     => 'required|string',
        ],);
        if ($validated->fails())
        {return $validated->errors();}
        $getLastCountry = Country::find($id);
        if($getLastCountry){
            $getLastCountry->update([
                'country_name' => request()->country_name,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
        }else{
        }
        $allCountries= Country::all();
        return response()->json(["success" => "Country Updated Successfully",'allCountries'=>$allCountries], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getCountry = Country::find($id);
        if($getCountry){
            $getCountry->delete();
            $allCountries= Country::all();
            return response()->json(["success" => "Country Deleted Successfully",'allCountries'=>$allCountries], 201);
        }else{
            return response()->json(["error" => "Country not found"], 201);
        }
    }
}
