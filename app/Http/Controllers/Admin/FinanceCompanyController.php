<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\commonFormValidation;
use App\Models\financecompany;

class FinanceCompanyController extends Controller
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
        $dataforshow = financecompany::orderBy('id', 'DESC')->get();
        $title = 'Finance company';
        $type = 'financecompanysave';
        $inputName = 'Finance company name';
        $formtype = 'Please fill the form';
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
        // save into table
        $data = new financecompany;
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
        $dataforedit = financecompany::find($id);
        $title = 'Finance company';
        $type = 'financecompanyUpdate';
        $inputName = 'Finance company name';
        $formtype = 'Please update the form';
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
        $data = financecompany::find($id);
        $data->title = $request->title;
        $data->status = $request->status;
        $data->save();
        session()->flash('message','Updated successfully.');
        return redirect()->route('financecompany.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = financecompany::find($id);
        $data->delete();
        session()->flash('message','Deleted Successfully');
        return redirect()->back();
    }
}
