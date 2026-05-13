<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatus
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
       // return $next($request);
       if(auth()->user()->id_status != "1"){
        return $next($request);
       }else{
           return redirect('no-autorizado');
       }
    }
}
 