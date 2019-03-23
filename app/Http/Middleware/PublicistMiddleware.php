<?php

namespace App\Http\Middleware;

use Closure;
use App\Publicist;

class PublicistMiddleware
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
       
        if(auth()->check() && auth()->user()->role == 'PUBLICIST' && auth()->user()->profile == NULL){
             return $next($request);
        }else{
            return redirect()->route('home');
        }

    }
}
