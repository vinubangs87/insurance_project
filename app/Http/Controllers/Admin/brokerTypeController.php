<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\commonFormValidation;
//use App\Models\procuctname;
use App\Models\broker;
//use App\Models\producttype;
use App\Models\insuranceCompany;
use DB;

class brokerTypeController extends Controller
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
        //$insuranceCompany = insuranceCompany::orderBy('id', 'DESC')->where('status',1)->get();
        /*$dataforshow  = DB::table('brokers as br')
                        ->join('insurance_companies as ic', 'ic.id' ,'=', 'br.insurance_companies_id')
                        ->select('br.id','br.title','br.status','ic.title AS insuranceCompany_name')
                        ->orderBy('br.id', 'DESC')
                        ->get();*/
        $dataforshow = broker::orderBy('id', 'DESC')->get();
        $title = 'Broker/IRDA';
        $type = 'brokernameSave';
        $inputName = 'Broker/IRDA';
        $formtype = 'Please fill the form';
        //return view('admin.commonForm.commonForm',compact('insuranceCompany','dataforshow','title','type','inputName','formtype'));
        return view('admin.commonForm.commonForm',compact('dataforshow','title','type','inputName','formtype'));
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
    public function store(commonFormValidation $request)
    {
        /*$this->validate($request, [
            'insurance_companies_id' => 'required'
        ],
        [
            'required' => 'This field is required'
        ]);*/

        // save into table
        $data = new broker;
        //$data->insurance_companies_id = $request->insurance_companies_id;
        $data->title = $request->title;
        $data->status = $request->status;
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
        //$insuranceCompany = insuranceCompany::orderBy('id', 'DESC')->where('status',1)->get();
        $dataforedit = broker::find($id);
        $title = 'Broker/IRDA';
        $type = 'brokernameUpdate';
        $inputName = 'Broker/IRDA';
        $formtype = 'Please update the form';
        //return view('admin.commonForm.commonForm',compact('insuranceCompany','dataforedit','title','type','inputName','formtype'));
        return view('admin.commonForm.commonForm',compact('dataforedit','title','type','inputName','formtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(commonFormValidation $request, $id)
    {
        /*$this->validate($request, [
            'insurance_companies_id' => 'required'
        ],
        [
            'required' => 'This field is required'
        ]);*/

        $data = broker::find($id);
        //$data->insurance_companies_id = $request->insurance_companies_id;
        $data->title = $request->title;
        $data->status = $request->status;
        $data->save();
        session()->flash('message','Updated successfully.');
        return redirect()->route('broker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = procuctname::find($id);
        $data->delete();
        session()->flash('message','Deleted Successfully');
        return redirect()->back();
    }
}
