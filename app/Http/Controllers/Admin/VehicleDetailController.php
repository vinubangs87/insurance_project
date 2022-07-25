<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\vehicleDetailsValidation;
use App\Models\insuranceCompany;
use App\Models\producttype;
use App\Models\procuctname;
use App\Models\enginetype;
use App\Models\permittype;
use App\Models\vehicledetail;
use App\Models\financecompany;
use DB;

class VehicleDetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurancecompany = insuranceCompany::Where('status',1)->orderBy('title', 'ASC')->get();
        $producttype = producttype::Where('status',1)->orderBy('title', 'ASC')->get();
        $procuctname = procuctname::Where('status',1)->orderBy('title', 'ASC')->get();
        $enginetype = enginetype::Where('status',1)->orderBy('title', 'ASC')->get();
        $permittype = permittype::Where('status',1)->orderBy('title', 'ASC')->get();
        $financecompany = financecompany::Where('status',1)->orderBy('title', 'ASC')->get();
        return view('admin.vehicleDetails.savedetails',compact('insurancecompany','producttype','procuctname','enginetype','permittype','financecompany'));
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
    public function store(vehicleDetailsValidation $request)
    {
        $data = new vehicledetail;
        $data->insuranceCompany_id = $request->insuranceCompany_id;
        $data->producttype_id = $request->producttype_id;
        $data->procuctname_id = $request->procuctname_id;
        $data->enginetype_id = $request->enginetype_id;
        $data->permittype_id = $request->permittype_id;
        $data->financecompany_id = $request->financecompany_id;
        $data->customer_name = $request->customer_name;
        $data->customer_mobile = $request->customer_mobile;
        $data->customer_email = $request->customer_email;
        $data->customer_address = $request->customer_address;
        $data->vehicle_number = $request->vehicle_number;
        $data->registration_number = $request->registration_number;
        $data->registration_date = $request->registration_date;
        $data->expiry_date = $request->expiry_date;
        $data->insurance_expiry_date = $request->insurance_expiry_date;
        $data->fitness_expiry_date = $request->fitness_expiry_date;
        $data->mv_tax_expiry_date = $request->mv_tax_expiry_date;
        $data->pucc_expiry_date = $request->pucc_expiry_date;
        $data->finance_type = $request->finance_type;
        $data->permit_number = $request->permit_number;
        $data->permit_valid_upto_date = $request->permit_valid_upto_date;
        $data->policy_number = $request->policy_number;
        $data->renewal_premium = $request->renewal_premium;
        $data->engine_number = $request->engine_number;
        $data->chasis_number = $request->chasis_number;
        $data->save();
        session()->flash('message','Created successfully.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicledetail = DB::table('vehicledetails AS vd')
                        ->leftjoin('insurance_companies AS ic','vd.insuranceCompany_id','=','ic.id')
                        ->leftjoin('producttypes AS pt','vd.producttype_id','=','pt.id')
                        ->leftjoin('procuctnames AS pn','vd.procuctname_id','=','pn.id')
                        ->leftjoin('enginetypes AS et','vd.enginetype_id','=','et.id')
                        ->leftjoin('permittypes AS pert','vd.permittype_id','=','pert.id')
                        ->leftjoin('financecompanies AS fc','vd.financecompany_id','=','fc.id')
                        ->select('vd.*','ic.title AS ic_title','pt.title AS pt_title','pn.title AS pn_title','et.title AS et_title','pert.title AS pert_title','fc.title AS fc_title')
                        ->where('vd.id','=',$id)
                        ->first();
        return view('admin.vehicleDetails.vehicledetails',compact('vehicledetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insurancecompany = insuranceCompany::Where('status',1)->orderBy('title', 'ASC')->get();
        $producttype = producttype::Where('status',1)->orderBy('title', 'ASC')->get();
        $procuctname = procuctname::Where('status',1)->orderBy('title', 'ASC')->get();
        $enginetype = enginetype::Where('status',1)->orderBy('title', 'ASC')->get();
        $permittype = permittype::Where('status',1)->orderBy('title', 'ASC')->get();
        $financecompany = financecompany::Where('status',1)->orderBy('title', 'ASC')->get();
        $vehicledetail = vehicledetail::find($id);
        return view('admin.vehicleDetails.updatedetails',compact('insurancecompany','producttype','procuctname','enginetype','permittype','financecompany','vehicledetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(vehicleDetailsValidation $request, $id)
    {
        $data = vehicledetail::find($id);
        $data->insuranceCompany_id = $request->insuranceCompany_id;
        $data->producttype_id = $request->producttype_id;
        $data->procuctname_id = $request->procuctname_id;
        $data->enginetype_id = $request->enginetype_id;
        $data->permittype_id = $request->permittype_id;
        $data->financecompany_id = $request->financecompany_id;
        $data->customer_name = $request->customer_name;
        $data->customer_mobile = $request->customer_mobile;
        $data->customer_email = $request->customer_email;
        $data->customer_address = $request->customer_address;
        $data->vehicle_number = $request->vehicle_number;
        $data->registration_number = $request->registration_number;
        $data->registration_date = $request->registration_date;
        $data->expiry_date = $request->expiry_date;
        $data->insurance_expiry_date = $request->insurance_expiry_date;
        $data->fitness_expiry_date = $request->fitness_expiry_date;
        $data->mv_tax_expiry_date = $request->mv_tax_expiry_date;
        $data->pucc_expiry_date = $request->pucc_expiry_date;
        $data->finance_type = $request->finance_type;
        $data->permit_number = $request->permit_number;
        $data->permit_valid_upto_date = $request->permit_valid_upto_date;
        $data->policy_number = $request->policy_number;
        $data->renewal_premium = $request->renewal_premium;
        $data->engine_number = $request->engine_number;
        $data->chasis_number = $request->chasis_number;
        $data->save();
        session()->flash('message','Updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        vehicledetail::find($id)->delete();  
        session()->flash('message','Deleted successfully.');
        return redirect()->back();
    }

    /**
     * Get all vehicle list.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehiclerecords()
    {
        $vehiclelist = vehicledetail::orderBy('id', 'DESC')->get();
        return view('admin.vehicleDetails.vehicleList',compact('vehiclelist'));
    }
}
