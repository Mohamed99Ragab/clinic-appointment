<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkingHour;
use Illuminate\Http\Request;

class WorkingHourController extends Controller
{

    public function index()
    {

        $working_hours = WorkingHour::all();

        return view('admin.hours',compact('working_hours'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'day'=>'required|unique:working_hours,day',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);


        WorkingHour::create([
            'day'=>$request->day,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time
        ]);

        session()->flash('success','working hour added success');

        return back();



    }


    public function show(WorkingHour $workingHour)
    {
        //
    }


    public function edit(WorkingHour $workingHour)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'day'=>'required|unique:working_hours,day,'.$id,
            'start_time'=>'required',
            'end_time'=>'required',
        ]);

        $hour = WorkingHour::findorFail($id);

        $hour->update([
            'day'=>$request->day,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time
        ]);

        session()->flash('success','working hour updated success');

        return back();

    }


    public function destroy($id)
    {
        WorkingHour::destroy($id);

        session()->flash('success','working hour delete success');
        return back();
    }
}
