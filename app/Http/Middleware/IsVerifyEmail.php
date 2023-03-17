<?php

namespace App\Http\Middleware;

use App\Http\Traits\ResponseTrait;
use Closure;
use Illuminate\Http\Request;

class IsVerifyEmail
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {        
        if (isset(auth('patient-api')->user()->is_email_verified)) {
            auth('patient-api')->logout();
            return $this->returnError('E5003','You need to confirm your account. We have sent you an activation code, please check your email.');
          }
        return $next($request);
    }
}
