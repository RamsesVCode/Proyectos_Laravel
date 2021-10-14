<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check()){
            return redirect()->back()->with("error-login","Debe iniciar sesión");
        }
        if(auth()->user()->isTeacher()){
            return $next($request);
        }
        return abort(403);
    }
}
