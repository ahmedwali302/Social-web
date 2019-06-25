<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;




class profileController extends Controller
{

    public function getProfile($username){
        return view('/home');
    }

    public function submit(Request $request){
        $this->validate($request,[
            'firstname'=>'required|max:120',
            'lastname'=>'required|max:120',
            'birthdate'=>'required',
            'gender'=>'required|not_in:Choose Gender',
            'mstatus'=>'not_in:Choose Your Relationship'
            ]);
        $filename = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images',$filename);
        $user = Auth::user();
        $user->first_name = $request['firstname'];
        $user->last_name = $request['lastname'];
        $user->gender = $request['gender'];
        $user->marital_status = $request['mstatus'];
        $user->bio = $request['bio'];
        $user->phone_number1 = $request['phonenumber'];
        $user->phone_number2 = $request['phonenumber1'];
        $user->hometown = $request['hometown'];
        $user->birthdate = $request['birthdate'];
        $user->image = $filename;
        $user->update();
        $user = Auth::user();
        return redirect('/home');        
    }

    public function edit(Request $request){
        $this->validate($request,[
            'email'=>'email',
            'gender'=>'not_in:Choose Gender',
            'mstatus'=>'not_in:Choose Your Relationship',
            ]);
            if($request->file('image')){ 
        $filename = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images',$filename);
            }else{
            }
        $user = Auth::user();
        $user->username = $request['username'];
        $user->email = $request['email'];        
        $user->first_name = $request['firstname'];
        $user->last_name = $request['lastname'];
        $user->gender = $request['gender'];
        $user->marital_status = $request['mstatus'];
        $user->bio = $request['bio'];
        $user->phone_number1 = $request['phonenumber'];
        $user->phone_number2 = $request['phonenumber1'];
        $user->hometown = $request['hometown'];
        $user->birthdate = $request['birthdate'];
        $user->image = $filename;
        $user->update();
        $user = Auth::user();
        return redirect('/home');        
    }

    public function changepassword(Request $request){
        $user = Auth::user();
        $this->validate($request,[
            'password'=>'min:8',
            'password_confirmation'=>'same:password',
            ]);
        $user->password = Hash::make($request['password']);
        $user->update();
        $user = Auth::user();
        return redirect('/home'); 
    }

    public function showprofile($id){
        $profile=User::find($id);
      //  dd($profile);
        return view('profile_view')->with('another_profile',$profile);
    }

    
}
