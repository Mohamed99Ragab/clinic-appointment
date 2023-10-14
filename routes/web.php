<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WorkingHourController;
use App\Http\Controllers\website\AuthController;
use App\Http\Controllers\website\ContactUsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[\App\Http\Controllers\website\HomeController::class,'home']);


Route::get('login',[AuthController::class,'loginView'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class,'login'])->name('loginCheck');


Route::get('register',[AuthController::class,'registerView'])->middleware('guest');
Route::post('register',[AuthController::class,'register'])->name('register')->middleware('guest');




// api to get doctors by service id
Route::get('doctors/{service_id}',[\App\Http\Controllers\website\HomeController::class,'getDoctorsByServiceId']);

// contact us
Route::post('sendToAdmin',[ContactUsController::class,'sendToAdmin'])->name('contact.us');


// website
Route::group(['middleware'=>'auth'],function (){

    Route::post('makeAppointment',[\App\Http\Controllers\website\HomeController::class,'makeAppointment'])->name('make.appoint');

});



// admin panel
Route::group(['prefix'=>'admin'],function (){




    Route::group(['middleware'=>'auth'],function (){


        Route::get('logout',[AuthController::class,'logout'])->name('logout');


        Route::get('home',[HomeController::class,'index'])->name('adminpanel');;



        // Services
        Route::resource('services',ServiceController::class);

        // doctors
        Route::resource('doctors',DoctorController::class);

        //cancle appiontment
        Route::post('appointments.cancel/{id}',[AppointmentController::class,'cancleAppointment'])->name('appointments.cancel');

        // appointments
        Route::resource('appointments',AppointmentController::class);



        //  Working hours
        Route::resource('hours',WorkingHourController::class);


        // profile
        Route::get('myprofile',[ProfileController::class,'profile'])->name('profile');
        Route::post('myprofile',[ProfileController::class,'updateProfile'])->name('profile.edit');


    });


});



