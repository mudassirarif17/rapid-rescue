<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\User;

class DriverController extends Controller
{
    public function index(){
        if(Auth::User()->usertype == '1'){
            // $app = Appointment::all();
            $app = Appointment::where('driver_name' , Auth::User()->name)->get();
            return view('driver.index' , compact('app'));
        }else{
            return redirect()->back();
        }
    }

    public function requests(){
        if(Auth::User()->usertype == '1'){
            $app = Appointment::where('isAccepted' , "0")->get();
            $drivers = User::find(Auth::User()->id);
            return view('driver.requests' , compact('app' , 'drivers'));
        }else{
            return redirect()->back();
        }
    }

    public function appointments(){
        if(Auth::User()->usertype == '1'){
            $app = Appointment::where('isAccepted' , "1")->get();
            return view('driver.appointments' , compact('app'));
        }else{
            return redirect()->back();
        }
    }

    public function driver_reached($id){
        if(Auth::User()->usertype == '1'){
            $app = Appointment::find($id);
            $app->isReached = "1";
            $drivers = User::find(Auth::User()->id);
            $drivers->isAvailable = "0";
            $app->save();
            $drivers->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }



    public function accept_app_dri($id){
        if(Auth::User()->usertype == '1'){
            $app = Appointment::find($id);
            $app->driver_id = Auth::User()->id;
            $app->driver_name = Auth::User()->name;
            $app->isAccepted = "1";

            $drivers = User::find(Auth::User()->id);
            $drivers->isAvailable = "1";
            $app->save();
            $drivers->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

}

