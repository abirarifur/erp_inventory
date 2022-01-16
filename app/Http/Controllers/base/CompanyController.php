<?php

namespace App\Http\Controllers\base;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCompanies= Company::all();
        $allCountries= Country::select('id','country_name')->get();
        return response()->json(['allCountries'=>$allCountries,'allCompanies'=>$allCompanies], 200);
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
            "company_name"      => 'required|max:255|unique:companies',
            "city_id"           => 'required|exists:cities,id',
            "state_id"          => 'required|exists:states,id',
            "country_id"        => 'required|exists:countries,id',
            // "phone"             => 'sometimes|string',
            // "mobile"            => 'sometimes|string',
            // "address"           => 'sometimes|string',
            // "gst_no"            => 'sometimes|string',
            // "vat_no"            => 'sometimes|string',
            // "pan_no"            => 'sometimes|string',
            'email'             => 'required|string|email',
            // 'logo'              => 'sometimes|image|mimes:jpg,jpeg,png,webp',
            "system_ip"         => 'required|string',
        ],);
        if ($validated->fails()){return $validated->errors();}
        if (request()->hasFile('logo')) {
            $validated = Validator::make($request->all(),[
                'logo' => 'required|image|mimes:jpg,jpeg,png,webp',],);
            if ($validated->fails()){return $validated->errors();}
        }
        $getLastCompany = Company::select('company_code')->orderBy('id', 'desc')->first();
        if($getLastCompany){
            $get_numbers = str_replace("COM","",$getLastCompany->company_code);
            $increase_number = $get_numbers+1;
            $get_new_number = str_pad($increase_number,3,0,STR_PAD_LEFT);
            $company_code = "COM".$get_new_number;
            $createCompany = Company::create([
                'company_code'      => $company_code,
                'company_name'      => request()->company_name,
                'city_id'           => request()->city_id,
                'state_id'          => request()->state_id,
                'country_id'        => request()->country_id,
                'phone'             => request()->phone,
                'mobile'            => request()->mobile,
                'address'           => request()->address,
                'gst_no'            => request()->gst_no,
                'vat_no'            => request()->vat_no,
                'pan_no'            => request()->pan_no,
                'email'             => request()->email,
                'system_ip'         => request()->system_ip,
                'created_by'        => request()->user()->id
            ]);
            if (request()->hasFile('logo')) {
                //* set file store folder
                $storeFolder = "images/companies/" . date("Y-m-d") . "/";
                //* get original file name
                $image_fileName = request()->file('logo')->getClientOriginalName();
                $image_fileExtension = request()->file('logo')->getClientOriginalExtension();
                //* remove file extension
                $image_fileName = strtok($image_fileName, ".");
                //* remove blank spaces
                $imageFinalName = str_replace(' ', '', $image_fileName);
                $image_UniqueName = $imageFinalName . "_" . time() . "." . $image_fileExtension;
                //? Full path with file name
                $image_fullPath = url('') . "/" . $storeFolder . $image_UniqueName;
                $basic_fullPath = $storeFolder . $image_UniqueName;
                //! Save file to server folder
                request()->file('logo')->move($storeFolder, $image_UniqueName);
                $createCompany->update([
                    'logo' => $image_fullPath,
                ]);
                $image = Image::make($basic_fullPath)->fit(300, 300);
                $image->save();
            }
            $allCompanies= Company::all();
            return response()->json(["success" => "State Added Successfully",'allCompanies'=>$allCompanies], 201);
        }else{
            $createCompany = Company::create([
                'company_code'      => "COM001",
                'company_name'      => request()->company_name,
                'city_id'           => request()->city_id,
                'state_id'          => request()->state_id,
                'country_id'        => request()->country_id,
                'phone'             => request()->phone,
                'mobile'            => request()->mobile,
                'address'           => request()->address,
                'gst_no'            => request()->gst_no,
                'vat_no'            => request()->vat_no,
                'pan_no'            => request()->pan_no,
                'email'             => request()->email,
                'system_ip'         => request()->system_ip,
                'created_by'        => request()->user()->id
            ]);
            if (request()->hasFile('logo')) {
                //* set file store folder
                $storeFolder = "images/companies/" . date("Y-m-d") . "/";
                //* get original file name
                $image_fileName = request()->file('logo')->getClientOriginalName();
                $image_fileExtension = request()->file('logo')->getClientOriginalExtension();
                //* remove file extension
                $image_fileName = strtok($image_fileName, ".");
                //* remove blank spaces
                $imageFinalName = str_replace(' ', '', $image_fileName);
                $image_UniqueName = $imageFinalName . "_" . time() . "." . $image_fileExtension;
                //? Full path with file name
                $image_fullPath = url('') . "/" . $storeFolder . $image_UniqueName;
                $basic_fullPath = $storeFolder . $image_UniqueName;
                //! Save file to server folder
                request()->file('logo')->move($storeFolder, $image_UniqueName);
                $createCompany->update([
                    'logo' => $image_fullPath,
                ]);
                $image = Image::make($basic_fullPath)->fit(300, 300);
                $image->save();
            }
            $allCompanies= Company::all();
            return response()->json(["success" => "Company Added Successfully",'allCompanies'=>$allCompanies], 201);
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
        //
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
            "company_name"      => 'required|max:255|unique:companies,company_name,'.$id,
            "city_id"           => 'required|exists:cities,id',
            "state_id"          => 'required|exists:states,id',
            "country_id"        => 'required|exists:countries,id',
            'email'             => 'required|string|email',
            "system_ip"         => 'required|string',
        ],);
        if ($validated->fails()){return $validated->errors();}
        if (request()->hasFile('logo')) {
            $validated = Validator::make($request->all(),[
                'logo' => 'required|image|mimes:jpg,jpeg,png,webp',],);
            if ($validated->fails()){return $validated->errors();}
        }
        $getCompanry = Company::where(['id'=>$id])->first();
        if($getCompanry){
            $getCompanry->update([
                'company_name'      => request()->company_name,
                'city_id'           => request()->city_id,
                'state_id'          => request()->state_id,
                'country_id'        => request()->country_id,
                'phone'             => request()->phone,
                'mobile'            => request()->mobile,
                'address'           => request()->address,
                'gst_no'            => request()->gst_no,
                'vat_no'            => request()->vat_no,
                'pan_no'            => request()->pan_no,
                'email'             => request()->email,
                'system_ip'         => request()->system_ip,
                'created_by'        => request()->user()->id
            ]);
            if (request()->hasFile('logo')) {
                if ($getCompanry->logo != '' || $getCompanry->logo != null) {
                    $imageLocation = str_replace(url('') . "/", "", $getCompanry->logo);
                    if (File::exists($imageLocation)) {
                        File::delete($imageLocation);
                    }
                    //* set file store folder
                    $storeFolder = "images/companies/" . date("Y-m-d") . "/";
                    //* get original file name
                    $image_fileName = request()->file('logo')->getClientOriginalName();
                    $image_fileExtension = request()->file('logo')->getClientOriginalExtension();
                    //* remove file extension
                    $image_fileName = strtok($image_fileName, ".");
                    //* remove blank spaces
                    $imageFinalName = str_replace(' ', '', $image_fileName);
                    $image_UniqueName = $imageFinalName . "_" . time() . "." . $image_fileExtension;
                    //? Full path with file name
                    $image_fullPath = url('') . "/" . $storeFolder . $image_UniqueName;
                    $basic_fullPath = $storeFolder . $image_UniqueName;
                    //! Save file to server folder
                    request()->file('logo')->move($storeFolder, $image_UniqueName);
                    $getCompanry->update([
                        'logo' => $image_fullPath,
                    ]);
                    $image = Image::make($basic_fullPath)->fit(300, 300);
                    $image->save();
                } else {
                    //* set file store folder
                    $storeFolder = "images/companies/" . date("Y-m-d") . "/";
                    //* get original file name
                    $image_fileName = request()->file('logo')->getClientOriginalName();
                    $image_fileExtension = request()->file('logo')->getClientOriginalExtension();
                    //* remove file extension
                    $image_fileName = strtok($image_fileName, ".");
                    //* remove blank spaces
                    $imageFinalName = str_replace(' ', '', $image_fileName);
                    $image_UniqueName = $imageFinalName . "_" . time() . "." . $image_fileExtension;
                    //? Full path with file name
                    $image_fullPath = url('') . "/" . $storeFolder . $image_UniqueName;
                    $basic_fullPath = $storeFolder . $image_UniqueName;
                    //! Save file to server folder
                    request()->file('logo')->move($storeFolder, $image_UniqueName);
                    $getCompanry->update([
                        'logo' => $image_fullPath,
                    ]);
                    $image = Image::make($basic_fullPath)->fit(300, 300);
                    $image->save();
                }
            }
            $allCompanies= Company::all();
            return response()->json(["success" => "Company Updated Successfully",'allCompanies'=>$allCompanies], 201);
        }
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
