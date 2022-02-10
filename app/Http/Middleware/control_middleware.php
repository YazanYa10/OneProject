<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class control_middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //True:If someone is not logged in, they will be directed to the registration page 
        if($request->user() === null){
            return redirect('/login');
        }
        //FalseLogged in, roles must be checked 
        //Step 1: Informartion      
        $action = $request->route()->getAction();
        //print_r($action);
        $roles = isset($action['roles']) ? $action['roles'] : null;
        if($request->user()->hasAnyRole($roles)){
            return $next($request);
        }
        else
        {
            return redirect('/access');
        }
        return $next($request);
    }
}
