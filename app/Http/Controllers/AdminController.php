<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ambulance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;


class AdminController extends Controller
{
    public function add_ambulance(){
        if(Auth::User()->usertype == '2'){
            $drivers = User::where('usertype', 1)->get();
            return view('admin.add_ambulance' , compact('drivers'));
        }else{
            return redirect()->back();
        }
    }


    public function add_driver(){
        if(Auth::User()->usertype == '2'){
            $amb = Ambulance::where('isReserved', 0)->get();
            return view('admin.add_driver' , compact('amb'));
        }else{
            return redirect()->back();
        }
    }

    public function upload_driver(Request $request){
        if(Auth::User()->usertype == '2'){
            $driver = new User();

            $image = $request->image;
            $imagename = time().''.$image->getClientOriginalExtension();
            $request->image->move('driverimage' , $imagename);
            $driver->image = $imagename;

            $driver->name = $request->name;
            $driver->email = $request->email;
            $driver->phone = $request->phone;
            $driver->address = $request->address;
            $driver->password = bcrypt("123456789");
            $driver->usertype = "1";
            $driver->save();
            
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }

    public function all_driver() {
        // Paginate only the drivers with usertype = 1
        if(Auth::User()->usertype == '2'){
            $driver = User::paginate(5);
            return view('admin.all_drivers', compact('driver'));
        }else{
            return redirect()->back();
        }
    }
    

    public function dashboard(){
        // $driver = User::all();
        if(Auth::User()->usertype == '2'){
            $drivers = User::where('usertype', 1)->get();
            return view('admin.index ' , compact('driver'));
        }else{
            return redirect()->back();
        }
    }

    public function allambulances(){
        if(Auth::User()->usertype == '2'){
            $amb = Ambulance::all();
            return view('admin.all_ambulances' , compact('amb'));
        }else{
            return redirect()->back();
        }
    }

    public function delete_driver($id){
        if(Auth::User()->usertype == '2'){
            $drivers = User::find($id)->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function edit_driver($id){
        if(Auth::User()->usertype == '2'){
            $drivers = User::find($id);
            return view('admin.edit_driver' , compact('drivers'));
        }else{
            return redirect()->back();
        }
    }

    public function update_driver(Request $request , $id){
        if(Auth::User()->usertype == '2'){
            $driver = User::find($id);

            $image = $request->image;
            $imagename = time().''.$image->getClientOriginalExtension();
            $request->image->move('driverimage' , $imagename);
            $driver->image = $imagename;

            $driver->name = $request->name;
            $driver->email = $request->email;
            $driver->phone = $request->phone;
            $driver->address = $request->address;

            $driver->save();
            return redirect("/all_driver");
        }else{
            return redirect()->back();
        }
    }

    public function upload_ambulance(Request $request){
        if(Auth::User()->usertype == '2'){
            $amb = new Ambulance();
            $amb->ambulance_num = $request->vehiclenum;
            $amb->e_level = $request->type;
            $amb->ambulance_capacity = $request->capacity;
            $amb->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }


     public function edit_ambulance($id){
        if(Auth::User()->usertype == '2'){
            $ambulance = Ambulance::find($id);
            return view('admin.edit_ambulance' , compact('ambulance'));
        }else{
            return redirect()->back();
        }   
    }

    public function update_ambulance(Request $request , $id){
        if(Auth::User()->usertype == '2'){
            $amb = Ambulance::find($id);
            $amb->ambulance_num = $request->vehiclenum;
            $amb->e_level = $request->type;
            $amb->ambulance_capacity = $request->capacity;
            $amb->save();
            return redirect("/all_ambulance");
        }else{
            return redirect()->back();
        }
    }

    public function appointment(){
        if(Auth::User()->usertype == '2'){
            
            return view('admin.appointments');
        }else{
            return redirect()->back();
        }   

}

public function all_reached_rides(){
    if(Auth::User()->usertype == '2'){
        $app = Appointment::where('isReached' , "1")->get();
        return view('admin.a_reached' , compact('app'));
    }else{
        return redirect()->back();
    }   

}


public function all_ongoing_rides(){
    if(Auth::User()->usertype == '2'){
        $app = Appointment::where('isAccepted' , "1")->get();
        return view('admin.a_accepted' , compact('app'));
    }else{
        return redirect()->back();
    }   
}

public function all_pending_rides(){
    if(Auth::User()->usertype == '2'){

        $app = Appointment::where('isAccepted' , "0")->get();
        return view('admin.a_pending' , compact('app'));
        
    }else{
        return redirect()->back();
    }   
}

}