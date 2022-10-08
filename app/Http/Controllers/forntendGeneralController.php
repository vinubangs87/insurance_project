<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insuranceCompany;
use App\Models\producttype;
use App\Models\procuctname;
use App\Models\enginetype;
use App\Models\permittype;
use App\Models\vehicledetail;
use App\Models\financecompany;
use DB;

class forntendGeneralController extends Controller
{
    public function vehicle_details(Request $request)
    {
        $request->validate([
        'vehicle_number' => 'required'
        ]);

        $vehicledetail = DB::table('vehicledetails AS vd')
                        ->leftjoin('insurance_companies AS ic','vd.insuranceCompany_id','=','ic.id')
                        ->leftjoin('producttypes AS pt','vd.producttype_id','=','pt.id')
                        ->leftjoin('procuctnames AS pn','vd.procuctname_id','=','pn.id')
                        ->leftjoin('enginetypes AS et','vd.enginetype_id','=','et.id')
                        ->leftjoin('permittypes AS pert','vd.permittype_id','=','pert.id')
                        ->leftjoin('financecompanies AS fc','vd.financecompany_id','=','fc.id')
                        ->select('vd.*','ic.title AS ic_title','pt.title AS pt_title','pn.title AS pn_title','et.title AS et_title','pert.title AS pert_title','fc.title AS fc_title')
                        ->where('vd.vehicle_number','=',$request->vehicle_number)
                        ->first();

        if ($vehicledetail) {
            return view('vehicle_modal_view_data', compact('vehicledetail'));
        }
        else
        {
            return view('no_data_vehicle_modal_view');
        }
    }
}
