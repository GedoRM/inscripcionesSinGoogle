<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolEscolares
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
        $usuario = DB::table('role_user')
        ->where('user_id', Auth::user()->id)
        ->where('role_id', 6)
        ->count();

        if($usuario == 1){
            return $next($request);
        }
        abort(403, 'Acción no autorizada');
    }
}
