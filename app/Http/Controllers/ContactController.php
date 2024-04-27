<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ContactController extends Controller
{

    public function contact(){
        return view("user.contact");
    }


    public function store(Request $request){


        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);



        $data=new Contact;
        $data->name=$request->name;
        $data->email=$request->email;
      
       
        $data->message=$request->message;
       
        $data->save();
        $request->session()->flash('success', 'THANKING YOU! FOR SEND MESSAGE');

        return redirect()->back();
         }
        }    