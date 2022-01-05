<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
//        dd(request()->all());
        $attributes = request()->validate([
            'name' =>'required|max:10',
//            'username' =>'required|min:3|max:255|unique:users,username',
            'username' =>['required', 'min:3', 'max:255', Rule::unique('users','username')],
            'email' =>'required|email|max:255|unique:users,email',
            'password' =>['required', 'max:255', 'min:7'],
        ]);     // checks if everything matches if not returns route back

//        $attributes['password'] = bcrypt($attributes['password'] );
        $user = User::create($attributes);
        auth()->login($user);

//        session()->flash('success', 'Your account has been created');
        return redirect('/')->with('success', 'Your account has been created');
    }
}
