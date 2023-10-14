<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\WorkingHour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home(){

        $services = Service::all();
        $doctors = Doctor::all();
        $hours = WorkingHour::all();

        return view('website.home',compact('services','doctors','hours'));
    }

    public function getDoctorsByServiceId($serviceId){

        $doctors = Doctor::where('service_id',$serviceId)->pluck('name','id');

        return $doctors;

    }




    public function makeAppointment(Request $request){


        $validator = Validator::make($request->all(), [
            'service'=>'required|exists:services,id',
            'doctor'=>'required|exists:doctors,id',
            'appointment_date'=>'required|date',
            'appointment_time'=>'required'
        ]);

        if ($validator->fails()) {

            session()->flash('error',$validator->errors()->first());
            return back();

        }




        Appointment::create([
            'user_id'=>Auth::id(),
            'service_id'=>$request->service,
            'doctor_id'=>$request->doctor,
            'appointment_date'=>date_format(Carbon::parse($request->appointment_date),'Y-m-d'),
            'appointment_time'=>date_format(Carbon::parse($request->appointment_time),'H:i:s')
        ]);


        session()->flash('success','Your appointment is send success');
        return back();




    }





}
