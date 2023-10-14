<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Comment\Doc;
use Psy\Util\Str;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::get();


        return view('admin.doctors.index',compact('doctors'));
    }


    public function create()
    {

        $services = Service::get();

        return view('admin.doctors.add',compact('services'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'photo'=>'required|image',
            'service_id'=>'required|exists:services,id',
        ]);


        Doctor::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'photo'=>$request->file('photo')->hashName(),
            'service_id'=>$request->service_id,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'instagram_url'=>$request->instagram_url
        ]);

        $request->file('photo')->store('doctors','public');

        session()->flash('success','doctor added success');

        return back();



    }


    public function show(Doctor $doctor)
    {
        //
    }


    public function edit($id)
    {
        $services = Service::get();

        $doctor = Doctor::findorFail($id);


        return view('admin.doctors.edit',compact('doctor','services'));

    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'photo'=>'image',
            'service_id'=>'required|exists:services,id',
        ]);

        $doctor = Doctor::findorFail($id);

        if ($request->file('photo'))
        {

//            delete old doctor img from server
            Storage::disk('public')->delete('doctors/'.$doctor->photo);

            $doctor->update([
                'photo'=>$request->file('photo')->hashName()
            ]);

//            store new doctor photo
            $request->file('photo')->store('doctors','public');
        }

        $doctor->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'service_id'=>$request->service_id,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'instagram_url'=>$request->instagram_url
        ]);

        session()->flash('success','doctor updated success');

        return redirect()->route('doctors.index');




    }


    public function destroy($id)
    {
        Doctor::destroy($id);

        session()->flash('success','doctor delete success');
        return back();
    }
}
