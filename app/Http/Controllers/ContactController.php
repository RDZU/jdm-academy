<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact; // llamamos al modelo Contact
class ContactController extends Controller
{



//vista contact
public function contact(){
    return view('contact');
    
}



//guarda datos contact
    public function message(Request $request)
{

$this->validate($request,[
	'name'=>'required',
  'lastname'=>'required',
  'email'=>'required',
   'message'=>'required|min:10'

  ]);

$contact= new Contact;
$contact->name= $request->get('name');
$contact->lastname= $request->get('lastname');
$contact->email=$request->get('email');
$contact->message= $request->get('message');
$contact->save();
return redirect()->route('contact');
}
}
