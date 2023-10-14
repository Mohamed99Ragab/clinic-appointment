<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{


    public function profile(){

        return view('admin.auth.edit-profile');
    }
   public function updateProfile(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.Auth::id(),

        ]);

        $user = User::find(Auth::id());

        if($request->file('photo')){

            Storage::disk('public')->delete('users'.$user->photo);

            $user->update([
                'photo'=>$request->file('photo')->hashName()
            ]);


            $request->file('photo')->store('users','public');


        }

        if($request->password && !empty($request->password)){

            $user->update([
                'password'=>Hash::make($request->password)
            ]);

        }

       $user->update([
           'name'=>$request->name,
           'email'=>$request->email,

       ]);

        session()->flash('success','profile updated successfully');
        return redirect()->route('adminpanel');


   }



}
