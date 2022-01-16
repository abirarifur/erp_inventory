<?php

namespace App\Http\Controllers\base;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allStates= State::with("country")->get();
        $allCountries= Country::select('id','country_name')->get();
        return response()->json(['allStates'=>$allStates,'allCountries'=>$allCountries], 200);
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
            "state_name"  => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/|unique:states',
            "country_id"     => 'required|exists:countries,id',
            "system_ip"     => 'required|string',
        ],);
        if ($validated->fails())
        {return $validated->errors();}
        $getLastState = State::select('state_code')->orderBy('id', 'desc')->first();
        if($getLastState){
            $get_numbers = str_replace("STA","",$getLastState->state_code);
            $increase_number = $get_numbers+1;
            $get_new_number = str_pad($increase_number,3,0,STR_PAD_LEFT);
            $state_code = "STA".$get_new_number;
            State::create([
                'state_code' => $state_code,
                'state_name' => request()->state_name,
                'country_id' => request()->country_id,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
            $allStates= State::with("country")->get();
            return response()->json(["success" => "State Added Successfully",'allStates'=>$allStates], 201);
        }else{
            State::create([
                'state_code' => "STA001",
                'state_name' => request()->state_name,
                'country_id' => request()->country_id,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
            $allStates= State::with("country")->get();
            return response()->json(["success" => "State Added Successfully",'allStates'=>$allStates], 201);
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
        $allCities = City::select('id','city_name')->where('state_id',$id)->get();
        return response()->json(['allCities'=>$allCities], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getState = State::find($id);
        if($getState){
            if($getState->status == 1){
                $getState->update([
                    'status'=>0
                ]);
            }else{
                $getState->update([
                    'status'=>1
                ]);
            }
            $allStates= State::with("country")->get();
            return response()->json(["success" => "State status changed",'allStates'=>$allStates], 201);
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
            "state_name"  => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/|unique:states,state_name,'.$id,
            "country_id"     => 'required|exists:countries,id',
            "system_ip"     => 'required|string',
        ],);
        if ($validated->fails())
        {return $validated->errors();}
        $getLastState = State::find($id);
        if($getLastState){
            $getLastState->update([
                'state_name' => request()->state_name,
                'country_id' => request()->country_id,
                'system_ip' => request()->system_ip,
                'created_by' => request()->user()->id
            ]);
        }else{
        }
        $allStates= State::with("country")->get();
        return response()->json(["success" => "State Updated Successfully",'allStates'=>$allStates], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getState = State::find($id);
        if($getState){
            $getState->delete();
            $allStates= State::with("country")->get();
            return response()->json(["success" => "State Deleted Successfully",'allStates'=>$allStates], 201);
        }else{
            return response()->json(["error" => "State not found"], 201);
        }
    }
}
