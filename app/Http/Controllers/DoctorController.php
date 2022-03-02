<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Helper\Helper;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class DoctorController extends Controller
{
public function login()
{
    if(View::exists('doctor.auth.login'))
    {
        return view('doctor.auth.login');
    }
    abort(Response::HTTP_NOT_FOUND);
}

public function processLogin(Request $request)
{
    $credentials = $request->except(['_token']);

//if(isDoctorActive($request->email))
//{
    if(Auth::guard('doctor')->attempt($credentials))
    {
        return redirect(RouteServiceProvider::DOCTOR);
    }
    return redirect()->action([DoctorController::class, 'login'])->with('message','Credentials not matced in our records!');
//    }
//    return redirect()->action([DoctorController::class, 'login'])->with('message','You are not an active doctors!');
}

public  function home() {
    return view('doctor.auth.home');
}
}
