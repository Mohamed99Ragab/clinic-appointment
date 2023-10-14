<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $appointmentsAccepted = Appointment::where('status','accepted')->count();
        $appointmentsCancled = Appointment::where('status','canceled')->count();
        $totalDoctors = Doctor::count();
        $totalPatients = User::where('role',2)->count();


//        patient
        $appointmentsAcceptedOfPatient = Appointment::where('status','accepted')->where('user_id',Auth::id())->count();
        $appointmentsCancledOfPatient = Appointment::where('status','canceled')->where('user_id',Auth::id())->count();

        return view('admin.dashboard',
            compact(
            'appointmentsAccepted',
            'appointmentsCancled',
            'totalPatients','totalDoctors',
                'appointmentsAcceptedOfPatient',
                'appointmentsCancledOfPatient'
            ));
    }
}
