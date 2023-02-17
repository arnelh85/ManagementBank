<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomizedAuthentication {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next) {
    
        try {
        
            if ($request -> routeIs('authentication.login') != true && Session::missing('s_username')) {
                return redirect() -> route('authentication.login');    
            }
            return $next($request);

        } 
        
        catch (\Exception $exc) {

            return 'Message: '. $exc -> getMessage();
            //return $exc -> getTrace();

        }   
        
    } 

}

?>