<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register(){

        // return ['Result' => 'Connected'];
        return view('register');
    }

    public function create(Request $req) {

        // $register = Register::create([
        //                 'name' => $req->name,
        //                 'phone' => $req->phone,
        //                 'email' => $req->email,
        //                 'address' => $req->address,
        //                 'password' => $req->password,
        //             ]);

        // if($register){

        //     return view('register');
        // }
    

        $validatedData = $req->validate([
            'name'=>'required|string|max:20',
            'phone'=>'required|unique:registers|min:11|max:11',  // must be 11 digits | for some reason numeric causes issue
            'email'=>'required|email|unique:registers',     // must contain email format @ | unique in registers table
            'password'=>'required|min:8|max:20|alpha_num',    
            'confirm_password'=>'required|same:password', 
            'address'=>'string'
        ],[
            'name.required'=>'must contain your name',         // adding custom error msg
            'phone.required'=>'must contain your phone',
            'phone.min'=>'must contain exactly 11 digits',
            'phone.max'=>'must contain exactly 11 digits',
            'email.required'=>'must contain your email',
            'password.required'=>'must contain your password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);    // saving password as Hash

        $reg = Register::create($validatedData);

        return back()->with('success','Congrats!!! You are registered');    // can be accessed with Session::has('success') in the view and for the error->has('name'), $errors

    }   

}
