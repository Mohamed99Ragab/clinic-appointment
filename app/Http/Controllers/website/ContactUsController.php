<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{


    public function sendToAdmin(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $admin = User::where('role',1)->first();


        Mail::to($admin->email)->send(new ContactUsMail($name,$email,$subject,$message));

        session()->flash('success','thanks for send your request and admin will replay');

        return back();

    }


}
