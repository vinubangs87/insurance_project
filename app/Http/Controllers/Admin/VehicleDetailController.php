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
use App\Models\paymentsettlement;
use App\Models\insuranceAmountHisstory;
use DB;
use Carbon\Carbon;
use Auth;

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
    //public function store(Request $request)
    {
        $request->validate([
        'rc_image' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg|max:500',
        'previous_insurance_file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg|max:500',
        'new_insurance_file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg|max:500'
        ]);

        $fileName_rc_image = $fileName_previous_insurance_file = $fileName_new_insurance_file = '';
        if($request->hasFile('rc_image')){
        $file_rc_image = $request->file('rc_image');
        $fileName_rc_image = time().'_'.$file_rc_image->getClientOriginalName();
        $filePath = $file_rc_image->storeAs('uploads/file_rc_image', $fileName_rc_image, 'public');
        }

        if($request->hasFile('previous_insurance_file')){
        $previous_insurance_file = $request->file('previous_insurance_file');
        $fileName_previous_insurance_file = time().'_'.$previous_insurance_file->getClientOriginalName();
        $filePath = $previous_insurance_file->storeAs('uploads/previous_insurance_file', $fileName_previous_insurance_file, 'public');
        }

        if($request->hasFile('new_insurance_file')){
        $new_insurance_file = $request->file('new_insurance_file');
        $fileName_new_insurance_file = time().'_'.$new_insurance_file->getClientOriginalName();
        $filePath = $new_insurance_file->storeAs('uploads/new_insurance_file', $fileName_new_insurance_file, 'public');
        }

        $registration_date = Carbon::createFromFormat('d/m/Y', $request->registration_date)->format('Y-m-d');
        $expiry_date = Carbon::createFromFormat('d/m/Y', $request->expiry_date)->format('Y-m-d');
        $insurance_start_date = Carbon::createFromFormat('d/m/Y', $request->insurance_start_date)->format('Y-m-d');
        $insurance_expiry_date = Carbon::createFromFormat('d/m/Y', $request->insurance_expiry_date)->format('Y-m-d');
        $fitness_expiry_date = Carbon::createFromFormat('d/m/Y', $request->fitness_expiry_date)->format('Y-m-d');
        $mv_tax_expiry_date = Carbon::createFromFormat('d/m/Y', $request->mv_tax_expiry_date)->format('Y-m-d');
        $pucc_expiry_date = Carbon::createFromFormat('d/m/Y', $request->pucc_expiry_date)->format('Y-m-d');
        $permit_valid_upto_date = Carbon::createFromFormat('d/m/Y', $request->permit_valid_upto_date)->format('Y-m-d');
        $policy_start_date = Carbon::createFromFormat('d/m/Y', $request->policy_start_date)->format('Y-m-d');
        $policy_end_date = Carbon::createFromFormat('d/m/Y', $request->policy_end_date)->format('Y-m-d');
        
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
        //$data->registration_number = $request->registration_number;
        $data->registration_date = $registration_date;
        $data->expiry_date = $expiry_date;
        $data->rc_image = $fileName_rc_image;
        $data->insurance_start_date = $insurance_start_date;
        $data->insurance_expiry_date = $insurance_expiry_date;
        $data->fitness_expiry_date = $fitness_expiry_date;
        $data->previous_insurance_file = $fileName_previous_insurance_file;
        $data->new_insurance_file = $fileName_new_insurance_file;
        $data->mv_tax_expiry_date = $mv_tax_expiry_date;
        $data->pucc_expiry_date = $pucc_expiry_date;
        $data->finance_type = $request->finance_type;
        $data->permit_number = $request->permit_number;
        $data->permit_valid_upto_date = $permit_valid_upto_date;
        $data->policy_number = $request->policy_number;
        $data->policy_start_date = $policy_start_date;
        $data->policy_end_date = $policy_end_date;
        $data->renewal_premium = $request->renewal_premium;
        $data->engine_number = $request->engine_number;
        $data->chasis_number = $request->chasis_number;
        $data->insurance_amount = $request->insurance_amount;
        $data->save();
        $vehicledetail_id = $data->id;

        // Add insuranceAmountHisstory column
        /*$data_insuranceAmountHisstory = new insuranceAmountHisstory;
        $data_insuranceAmountHisstory->vehicledetail_id = $vehicledetail_id;
        $data_insuranceAmountHisstory->save();
        $insuranceAmountHisstory_id = $data_insuranceAmountHisstory->id;*/

        // Add paymentsettlement column
        $data_paymentsettlement = new paymentsettlement;
        $data_paymentsettlement->vehicledetail_id = $vehicledetail_id;
        //$data_paymentsettlement->insuranceAmountHisstory_id = $insuranceAmountHisstory_id;
        $data_paymentsettlement->save();

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
        $vehicledetail = vehicledetail::find($id);
        $insurancecompany = insuranceCompany::Where('status',1)->orderBy('title', 'ASC')->get();
        $producttype = producttype::Where('status',1)->orderBy('title', 'ASC')->get();
        $procuctname = procuctname::Where('status',1)->where('producttypes_id',$vehicledetail->producttype_id)->orderBy('title', 'ASC')->get();
        $enginetype = enginetype::Where('status',1)->orderBy('title', 'ASC')->get();
        $permittype = permittype::Where('status',1)->orderBy('title', 'ASC')->get();
        $financecompany = financecompany::Where('status',1)->orderBy('title', 'ASC')->get();

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
        $request->validate([
        'rc_image' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|max:500',
        'previous_insurance_file' => 'nullable|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg|max:500',
        'new_insurance_file' => 'nullable|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg|max:500'
        ]);

        $fileName_rc_image = $fileName_previous_insurance_file = $fileName_new_insurance_file = '';
        if($request->hasFile('rc_image')){
        $file_rc_image = $request->file('rc_image');
        $fileName_rc_image = time().'_'.$file_rc_image->getClientOriginalName();
        $filePath = $file_rc_image->storeAs('uploads/file_rc_image', $fileName_rc_image, 'public');
        }

        if($request->hasFile('previous_insurance_file')){
        $previous_insurance_file = $request->file('previous_insurance_file');
        $fileName_previous_insurance_file = time().'_'.$previous_insurance_file->getClientOriginalName();
        $filePath = $previous_insurance_file->storeAs('uploads/previous_insurance_file', $fileName_previous_insurance_file, 'public');
        }

        if($request->hasFile('new_insurance_file')){
        $new_insurance_file = $request->file('new_insurance_file');
        $fileName_new_insurance_file = time().'_'.$new_insurance_file->getClientOriginalName();
        $filePath = $new_insurance_file->storeAs('uploads/new_insurance_file', $fileName_new_insurance_file, 'public');
        }
        
        $registration_date = Carbon::createFromFormat('d/m/Y', $request->registration_date)->format('Y-m-d');
        $expiry_date = Carbon::createFromFormat('d/m/Y', $request->expiry_date)->format('Y-m-d');
        $insurance_start_date = Carbon::createFromFormat('d/m/Y', $request->insurance_start_date)->format('Y-m-d');
        $insurance_expiry_date = Carbon::createFromFormat('d/m/Y', $request->insurance_expiry_date)->format('Y-m-d');
        $fitness_expiry_date = Carbon::createFromFormat('d/m/Y', $request->fitness_expiry_date)->format('Y-m-d');
        $mv_tax_expiry_date = Carbon::createFromFormat('d/m/Y', $request->mv_tax_expiry_date)->format('Y-m-d');
        $pucc_expiry_date = Carbon::createFromFormat('d/m/Y', $request->pucc_expiry_date)->format('Y-m-d');
        $permit_valid_upto_date = Carbon::createFromFormat('d/m/Y', $request->permit_valid_upto_date)->format('Y-m-d');
        $policy_start_date = Carbon::createFromFormat('d/m/Y', $request->policy_start_date)->format('Y-m-d');
        $policy_end_date = Carbon::createFromFormat('d/m/Y', $request->policy_end_date)->format('Y-m-d');

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
        //$data->registration_number = $request->registration_number;
        $data->registration_date = $registration_date;
        $data->expiry_date = $expiry_date;
        if($request->hasFile('rc_image')){ $data->rc_image = $fileName_rc_image; }
        $data->insurance_start_date = $insurance_start_date;
        $data->insurance_expiry_date = $insurance_expiry_date;
        $data->fitness_expiry_date = $fitness_expiry_date;
        if($request->hasFile('previous_insurance_file')){ $data->previous_insurance_file = $fileName_previous_insurance_file; }
        if($request->hasFile('new_insurance_file')){ $data->new_insurance_file = $fileName_new_insurance_file; }
        $data->mv_tax_expiry_date = $mv_tax_expiry_date;
        $data->pucc_expiry_date = $pucc_expiry_date;
        $data->finance_type = $request->finance_type;
        $data->permit_number = $request->permit_number;
        $data->permit_valid_upto_date = $permit_valid_upto_date;
        $data->policy_number = $request->policy_number;
        $data->policy_start_date = $policy_start_date;
        $data->policy_end_date = $policy_end_date;
        $data->renewal_premium = $request->renewal_premium;
        $data->engine_number = $request->engine_number;
        $data->chasis_number = $request->chasis_number;
        $data->insurance_amount = $request->insurance_amount;
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

    /**
     * Get all dependent product name based on product type.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_dependent_project_name(Request $request)
    {
        $procuctNames = procuctname::where('producttypes_id',$request->product_type_id)->pluck('title','id');
        if ($procuctNames) {
            return response()->json(['status' => 'success', 'data' => $procuctNames], 200);
        }
        return response()->json(['status' => 'failed', 'message' => 'No record found'], 404);
    }

    /**
     * View/Update Insurance amount history
     *
     * @return \Illuminate\Http\Response
     */
    public function insurance_amount_show($id)
    {
        $vehicledetail = vehicledetail::find($id);
        $paymentsettlementsDetails = paymentsettlement::where('vehicledetail_id',$id)->first();
        return view('admin.vehicleDetails.insuranceAmountShow',compact('vehicledetail','paymentsettlementsDetails'));
    }

    /**
     * Update full payment type
     *
     * @return \Illuminate\Http\Response
     */
    public function add_fullPaymentType(Request $request)
    {
        // update paymentsettlement column
        $current_date_time = \Carbon\Carbon::now()->format('Y-m-d');
        $data = [
            'is_payment_settled'=>1,
            'payment_settled_date'=>$current_date_time,
            'settled_by'=>Auth::user()->id,
            'payment_type'=>$request->payment_type,
        ];
        $result = paymentsettlement::where('id', $request->paymentsettlementsDetails_id)->update($data);

        if($result){
            return response()->json(['status' => 'success', 'message' => 'Updated successfully.'], 200);
        }
        else{
            return response()->json(['status' => 'failed', 'message' => 'Something went wrong.'], 404);
        }

    }

    /**
     * Reset paymentsettlements record based on full payment type delete or partial payment type delete
     *
     * @return \Illuminate\Http\Response
     */
    public function reset_records_based_on_paymentType($id)
    {
        $data = paymentsettlement::find($id);
        $data->insuranceAmountHisstory_id = null;
        $data->is_payment_settled = null;
        $data->payment_settled_date = null;
        $data->settled_by = null;
        $data->payment_type = null; 
        $result = $data->save();
        if($result){
        session()->flash('message','Deleted successfully.');
        return redirect()->back();
        }
        else
        {
            echo 'Something went wrong';
        }

    }
}
