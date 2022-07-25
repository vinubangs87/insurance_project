<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\commonFormValidation;
use App\Models\procuctname;
use App\Models\producttype;
use DB;

class ProductNameController extends Controller
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
        $producttype = producttype::orderBy('id', 'DESC')->get();
        $dataforshow  = DB::table('procuctnames as pn')
                        ->join('producttypes as pt', 'pt.id' ,'=', 'pn.producttypes_id')
                        ->select('pn.id','pn.title','pn.status','pt.title AS prducttype_name')
                        ->orderBy('pn.id', 'DESC')
                        ->get();
        $title = 'Product name';
        $type = 'procuctnameSave';
        $inputName = 'Product name name';
        $formtype = 'Please fill the form';
        return view('admin.commonForm.commonForm',compact('producttype','dataforshow','title','type','inputName','formtype'));
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
        $this->validate($request, [
            'producttypes_id' => 'required'
        ],
        [
            'required' => 'This field is required'
        ]);

        // save into table
        $data = new procuctname;
        $data->producttypes_id = $request->producttypes_id;
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
        $producttype = producttype::orderBy('id', 'DESC')->get();
        $dataforedit = procuctname::find($id);
        $title = 'Product name';
        $type = 'procuctnameUpdate';
        $inputName = 'Product name name';
        $formtype = 'Please update the form';
        return view('admin.commonForm.commonForm',compact('producttype','dataforedit','title','type','inputName','formtype'));
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
        $this->validate($request, [
            'producttypes_id' => 'required'
        ],
        [
            'required' => 'This field is required'
        ]);

        $data = procuctname::find($id);
        $data->producttypes_id = $request->producttypes_id;
        $data->title = $request->title;
        $data->status = $request->status;
        $data->save();
        session()->flash('message','Updated successfully.');
        return redirect()->route('procuctname.index');
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
