<?php

namespace App\Http\Middleware;
use App\Users;
use Closure;

class DeviceTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {

        if(Users::where('device_token', $request->device_token)->exists()){
            //return response()->json(['error' => false, 'data' => "Customer Found"], 200, []);
            return $next($request);
        }else{
            return response()->json(['error' => true, 'data' => 'Device Token Does Not Match'], 401, []);
        }
    }

}
