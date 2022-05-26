<?php

namespace App\Http\Middleware;

use Closure;

class SubscriptionStatus
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
        // if (auth()->user()->role_id == 0){
        //     abort(401);
        // }
        
        if(auth()->user()->role_id > 1 && getSystemSubscription()){
            return redirect()->route('system.expired');
        }else{
            return $next($request);
        }

        //return redirect()->route('login');
    }
}
