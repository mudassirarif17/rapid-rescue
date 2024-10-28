<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;



class UserController extends Controller
{
    public function index(){
        $app = Appointment::all();
        return view('users.index' , compact('app'));
    }

    public function about(){
        return view('users.about');
    }

    public function contact(){
        return view('users.contact');
    }

  

    public function testimonials(){
        return view('users.testimonial');
    }
    
    public function service(){
        return view('users.service');
    }

    public function add_appointment(Request $request){
        $app = new Appointment();

        $app->p_name = $request->p_name;
        $app->email = Auth::User()->email;
        $app->phone = $request->phone;
        $app->address = $request->address;
        $app->p_lat = $request->p_lat;
        $app->p_lang = $request->p_lang;
        $app->isAccepted = "0";
        $app->condition = $request->condition;
        $app->save();
        
        return redirect()->back();
    }

        

}
