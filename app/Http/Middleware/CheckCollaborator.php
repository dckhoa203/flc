<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckCollaborator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('user')&&Session::get('user')->role == 1 )
        {
            return $next($request);
        }else {
            return redirect('/');
        }
    }
}
