<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }
    public function store() {
        $attributes = request()->validate([
//            'email' => 'required|exists:users,email',     //could cause some security concerns
                            'email' => 'required|email',
                            'password' => 'required',
                        ]);

        if(! auth()->attempt($attributes)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'Your provided credentials could not be verified.']);
            return redirect('/')->with('success', 'Welcome Back!');
        }

        session()->regenerate();        // to save from session fixation attack



        // for failed attempt
//        return back()
//            ->withInput()         // sends input flash
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);      // again using errors bag like, validation error

        //alt way to do the same thing

    }
    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
