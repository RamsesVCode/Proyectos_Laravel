<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanAccessToCourseMiddleware
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
        $blockAccess = false;
        if(!auth()->check()){
            $blockAccess = true;
        }
        $course = $request->route()->parameter("course");
        $isTeacher = $course->user_id == auth()->id();
        $coursePurchased = $course->students->contains(auth()->id());
        if(!$isTeacher && !$coursePurchased){
            $blockAccess = true;
        }
        if($blockAccess){
            session()->flash("message",["danger",__("No puedes acceder a este curso")]);
            return redirect()->route("courses.show",$course);
        }
        return $next($request);
    }
}
