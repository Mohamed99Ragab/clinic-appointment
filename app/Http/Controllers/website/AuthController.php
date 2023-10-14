<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginView(){

        return view('website.auth.login');
    }


    public function login(Request $request){

        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required'
        ]);


        $user = User::where('email',$request->email)->first();

        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){

            auth()->login($user);

//            toastr()->success('login success');
            session()->flash('success','login success');

            return redirect()->route('adminpanel');
        }

        session()->flash('error','password is not correct');
        return redirect()->back();



    }



    public function registerView(){

        return view('website.auth.register');
    }



    public function register(Request $request){



        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed',

        ]);


        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($request->file('photo')){

           $user->photo = $request->file('photo')->hashName();

            //  store photo on server
            $request->file('photo')->store('users','public');

        }

        $user->save();


        session()->flash('success','your account created successfully');

        return redirect()->route('login');









    }











    public function logout(){

        auth()->logout();

        return redirect()->route('login');
    }


}
