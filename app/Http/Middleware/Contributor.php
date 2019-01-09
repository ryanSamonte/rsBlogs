<?php

namespace App\Http\Middleware;

use Closure;

class Contributor
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
        if(auth()->user()->role_id != 2){
            return redirect('/')->with('error','You have not contributor access');
        }
        return $next($request);
    }
}
