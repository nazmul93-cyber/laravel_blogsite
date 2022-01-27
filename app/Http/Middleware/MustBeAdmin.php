<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeAdmin
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
        // check if user is unregistered
        if(auth()->guest()) {
            abort(403);
//            abort(Response::HTTP_FORBIDDEN);        // symphony wala
        }

        // check if user is not admin
        if(auth()->user()->username != "Damore.ora") {
            abort(403);
        }

        return $next($request);         // when everything checks out pass it on to the next layer
    }
}
