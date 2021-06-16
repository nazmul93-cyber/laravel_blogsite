<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;        // must be added to use session

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // echo "Hello, from mw";      //every url inside this middleware will echo this msg
        
        $path = $request->path();   // current url path

        // echo $path;


        // if (($path == "login" || $path == "register") && (Session::get('user'))) {

        //         return redirect('/dashboard');
        // }


        // if($request->remember == "on") {

            // if($path == "login") {

            //     return redirect("dashboard");
            // }
        // }

        // if(auth()->user() && $path == "login"){
           

        //     return redirect("dashboard");
        // }
        


        return $next($request);
    }
}
