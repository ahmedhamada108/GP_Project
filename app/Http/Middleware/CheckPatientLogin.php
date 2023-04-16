<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPatientLogin
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
        if (auth('patient')->guest()) {
            auth('patient')->logout();
            session()->flash('error','You need to login to your account.');
            return redirect()->route('login');
        }else if( auth('patient')->user()->is_email_verified == 0){
            auth('patient')->logout();
            session()->flash('error','You need to confirm your account. We have sent you an activation code, please check your email.');
            return redirect()->route('login');
        }
        return $next($request);
    }
}
