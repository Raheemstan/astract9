<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        try {
        if (auth()->user()) {
            if (auth()->user()->status === 3) {
                return $next($request);
            }else{
                return abort(403);
            }
        }
        } catch (\Throwable $th) {

            return redirect()->route('home');     
        }
    }
}
