<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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

        // $validatedData['password'] = Hash::make($validatedData['password']);    // saving password as Hash 
        
        $validatedData['password'] = bcrypt($validatedData['password']);    // saving password as Hash using handler


        $reg = Register::create($validatedData);

        return redirect('/login')->with('success','Congrats!!! You are registered');    // can be accessed with Session::has('success') in the view and for the error->has('name'), $errors

    }   

// trial with Auth facade [could not even log in]

    // public function login(Request $request) {
        
    //     // $credentials = $request->validate([
    //     //     'email' => 'required|email|exists:registers,email',
    //     //     'password' => 'required',
    //     // ]);

    //     // $credentials = $request->only('email','password');

    //     // dd(Register::get());
    //     // dd($credentials);
    //     // dd(Auth::attempt($credentials));

    //     // if (Auth::attempt($credentials)) {
    //     //     $request->session()->regenerate();

    //     //     return redirect()->intended('dashboard');
    //     // }



    //     // dd(Auth::attempt(['email' => $request->email,'password' => $request->password]));

    //     // if (Auth::attempt($request->only('email','password'))) {
    //     //     $request->session()->regenerate();    // session generation is auto with login hence session regenerate

    //     //     return redirect()->intended('dashboard');
    //     // }

    //     // // return back()->withErrors([
    //     // //     'email' => 'The provided credentials do not match our records.',
    //     // // ]);

    //     // return back()->withInput();
    // }




// trial with custom logic, middleware, session [logged in but session not working]

    public function login(Request $request) {


        $request->validate([
        
            'email'=>'required|email|exists:registers,email',    
            'password'=>'required',    
        ]);

        $user = Register::whereEmail($request->email)->get();
              


        // dd(Hash::check($request->password,$user[0]->password));          // return true if matches


        if (Hash::check($request->password,Register::whereEmail($request->email)->first()->password)) {

                $request->session()->put("user","Logged_In");

                return redirect()->intended('dashboard');

        }

        // return back()->withSuccess([

        //         'email' => 'The provided credentials do not match our records.',

        //     ]);

        return back()->withFailed('Login credentials do not match records');
    }

    public function logout(Request $request) {

        $request->session()->flush();

        return redirect('/login');
    }





// trial with auth() helper [signin not working]

        // public function login(Request $request) {

        //     // $test = $request->only("email","password");
        //     // dd($test);
        //     // dd($request->remember);             // returns string "on"

        //     auth()->attempt($request->only("email","password"),$request->remember);        
        // auto hash checked | wow!!!

        //     return redirect("dashboard")->withSuccess('welcome to your profile');   // i guess, a session/flash named success
        // }

    

}
