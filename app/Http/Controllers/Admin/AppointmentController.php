<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::latest()->get();

        $patientAppointments = Appointment::latest()->where('user_id',Auth::id())->get();

        return view('admin.appointments',compact('appointments','patientAppointments'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Appointment $appointment)
    {
        //
    }


    public function edit(Appointment $appointment)
    {
        //
    }


    public function update(Request $request, $appointment_id)
    {
        $appointment = Appointment::findorFail($appointment_id);

        $appointment->update([
            'status'=>$request->status
        ]);

        session()->flash('success','appointment satus updated success');

        return back();




    }


    public function cancleAppointment($id)
    {

        $appointment = Appointment::findorFail($id);

        $appointment->update([
            'status'=>'canceled'
        ]);

        session()->flash('success','your appointment is canceled');

        return back();




    }


    public function destroy($id)
    {
        Appointment::destroy($id);

        session()->flash('success','Appointment delete success');
        return back();
    }
}
