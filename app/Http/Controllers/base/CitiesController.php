<?php

namespace App\Http\Controllers\base;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCities= City::with("country","state")->get();
        $allCountries= Country::select('id','country_name')->get();
        return response()->json(['allCountries'=>$allCountries,'allCities'=>$allCities], 200);
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
            "city_name"  => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/|unique:cities',
            "state_id"     => 'required|exists:states,id',
            "country_id"     => 'required|exists:countries,id',
            "system_ip"     => 'required|string',
        ],);
        if ($validated->fails())
        {return $validated->errors();}
        $getLastCity = City::select('city_code')->orderBy('id', 'desc')->first();
        if($getLastCity){
            $get_numbers = str_replace("CIT","",$getLastCity->city_code);
            $increase_number = $get_numbers+1;
            $get_new_number = str_pad($increase_number,3,0,STR_PAD_LEFT);
            $city_code = "CIT".$get_new_number;
            City::create([
                'city_code' => $city_code,
                'city_name' => request()->city_name,
                'state_id' => request()->state_id,
                'country_id' => request()->country_id,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
            $allCities= City::with("country","state")->get();
            return response()->json(["success" => "City Added Successfully",'allCities'=>$allCities], 201);
        }else{
            City::create([
                'city_code' => "CIT001",
                'city_name' => request()->city_name,
                'state_id' => request()->state_id,
                'country_id' => request()->country_id,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
            $allCities= City::with("country","state")->get();
            return response()->json(["success" => "State Added Successfully",'allCities'=>$allCities], 201);
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
        $allStates = State::select('id','state_name')->where('country_id',$id)->get();
        return response()->json(['allStates'=>$allStates], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getCity = City::find($id);
        if($getCity){
            if($getCity->status == 1){
                $getCity->update([
                    'status'=>0
                ]);
            }else{
                $getCity->update([
                    'status'=>1
                ]);
            }
            $allCities= City::with("country","state")->get();
            return response()->json(["success" => "City status changed",'allCities'=>$allCities], 201);
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
            "city_name"  => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/|unique:cities,city_name,'.$id,
            "state_id"     => 'required|exists:states,id',
            "country_id"     => 'required|exists:countries,id',
            "system_ip"     => 'required|string',
        ],);
        if ($validated->fails())
        {return $validated->errors();}
        $getLastCity = City::find($id);
        if($getLastCity){
            $getLastCity->update([
                'city_name' => request()->city_name,
                'state_id' => request()->state_id,
                'country_id' => request()->country_id,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
        }else{
        }
        $allCities= City::with("country","state")->get();
        return response()->json(["success" => "State Updated Successfully",'allCities'=>$allCities], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getCity = City::find($id);
        if($getCity){
            $getCity->delete();
            $allCities= City::with("country","state")->get();
            return response()->json(["success" => "City Deleted Successfully",'allCities'=>$allCities], 201);
        }else{
            return response()->json(["error" => "City not found"], 201);
        }
    }
}
