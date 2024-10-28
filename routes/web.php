<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Models\User;
use App\Models\Appointment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('users.index');
});*/

                // USER ROUTS
Route::get('/' , [UserController::class, 'index'])->name('user-index');
Route::get('/users.contact' , [UserController::class, 'contact'])->name('user-contact');
Route::get('/users.service' , [UserController::class, 'service'])->name('user-service');
Route::get('/users.testimonials' , [UserController::class, 'testimonials'])->name('user-testimonials');
Route::get('/users.about' , [UserController::class, 'about'])->name('user-about');


// Admin routes
Route::get('/add_ambulance' , [AdminController::class, 'add_ambulance'])->name('add-ambulance');
Route::post('/upload_ambulance' , [AdminController::class, 'upload_ambulance']);
Route::get('/add_driver' ,  [AdminController::class, 'add_driver'])->name('add-driver');
Route::get('/dashboard' ,  [AdminController::class, 'dashboard']);
Route::get('/all_driver' ,  [AdminController::class, 'all_driver'])->name('all-driver');
Route::post('/upload_driver' ,  [AdminController::class, 'upload_driver']);
Route::get('/delete_driver/{id}' ,  [AdminController::class, 'delete_driver']);
Route::get('/edit_driver/{id}' ,  [AdminController::class, 'edit_driver']);
Route::post('/update_driver/{id}' ,  [AdminController::class, 'update_driver']);


Route::post('/add_appointment' ,  [UserController::class, 'add_appointment']);

Route::get('/all_ambulance' ,  [AdminController::class, 'allambulances']);
Route::post('/upload_ambulance' ,  [AdminController::class, 'upload_ambulance']);
Route::get('/edit_ambulance/{id}' ,  [AdminController::class, 'edit_ambulance']);
Route::post('/update_ambulance/{id}' ,  [AdminController::class, 'update_ambulance']);

// driver rout idher hai bhai 
Route::get('/driver-index' , [DriverController::class, 'index'])->name('driver-index');
Route::get('/driver-requests' , [DriverController::class, 'requests'])->name('driver-requests');
Route::get('/driver-appointments' , [DriverController::class, 'appointments'])->name('driver-appointments');
Route::get('/accept_app_dri/{id}' , [DriverController::class, 'accept_app_dri']);
Route::get('/reached_app_dri/{id}' , [DriverController::class, 'driver_reached']);

Route::get('/appointment' ,  [AdminController::class, 'appointment'])->name('appointment');


Route::get('/a_request' ,  [AdminController::class, 'a_request'])->name('appointment.request');
Route::get('/a_accepted' ,  [AdminController::class, 'a_accepted'])->name('appointment.accepted'); 
Route::get('/all_reached_rides' ,  [AdminController::class, 'all_reached_rides']); 
Route::get('/all_ongoing_rides' ,  [AdminController::class, 'all_ongoing_rides']); 
Route::get('/all_pending_rides' ,  [AdminController::class, 'all_pending_rides']); 



Route::middleware([
    'auth:sanctum',

    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        if(Auth::id()){
            if(Auth::User()->usertype === '0'){
                $app = Appointment::all();
                return view('users.index', compact('app'));
            }
            elseif(Auth::User()->usertype === '1'){
                // $app = Appointment::where('driver_name' , Auth::User()->name)->get();
                $app = Appointment::all();
                return view('driver.index' , compact('app'));
            }else{
                $driver = User::where('usertype', 1)->get();
                return view('admin.index ' , compact('driver'));
            }
        }else{
            return redirect()->back();
        }
        
    })->name('dashboard');
});
