<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function index()
    {

        $services = Service::get();


        return view('admin.services',compact('services'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|image'
        ]);

        Service::create([
            'name'=>$request->name,
            'img'=>$request->file('image')->hashName()
        ]);

        // save service img on server
        $request->file('image')->store('services','public');


        session()->flash('success','service added success');

        return back();





    }



    public function show(Service $service)
    {
        //
    }


    public function edit(Service $service)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $service = Service::findorFail($id);

        $service->update([
            'name'=>$request->name,
        ]);

        if($request->file('image')){


//            delete old img
            Storage::disk('public')->delete('services/'.$service->img);


            $service->update([
                'img'=>$request->file('image')->hashName(),
            ]);

            //            store new img
            $request->file('image')->store('services','public');



        }

        session()->flash('success','service edit success');
        return back();



    }


    public function destroy($service_id)
    {
        Service::destroy($service_id);

        session()->flash('success','service delete success');
        return back();


    }
}
