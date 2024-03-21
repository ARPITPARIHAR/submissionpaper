<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ContactController extends Controller
{

    public function contact(){
        return view("user.contact");
    }


    public function store(Request $request){

        $data=new Contact;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->contact=$request->subject;
        $data->address=$request->message;
       
        $data->save();
        $request->session()->flash('success', 'THANKING YOU!');

        return redirect()->back();
         }
        }    