<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { if(Auth::check())
        {
            if(Auth::user()->is_admin == true)
            {   
                return $next($request);
            }
            else
            {
                return redirect('/accueil')->with('status','Accès interdit! vous n\'etes pas un admin');
            }
        }
        else
        {
            return redirect('/accueil')->with('status','veuillez vous connecter en premier');
        }

    }



}