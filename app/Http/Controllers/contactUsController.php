<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactFormMail;

class contactUsController extends Controller
{
    public function index()
    {
        return view('contacts');
    }

    function send_email(Request $request)
    {
     /*$this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);*/

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        );

     $result = Mail::to('vinodjaiswal87@gmail.com')->send(new SendContactFormMail($data));
     echo '<pre>';
     print_r($result);exit;
     return back()->with('success', 'Thanks for contacting us!');

    }
}
