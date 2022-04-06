<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;
use App\Course;
use App\Lesson;
use DB;
class Check_pay
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
        $lesson = Lesson::where('slug', $request->slug)->where('course_id', $request->course_id)->firstOrFail();
       $id_user=\Auth::id();

$payment=DB::table('course_student')->where("course_id", $request->course_id)->where("user_id", $id_user)->get()->count();
$free_lesson=DB::table('lessons')->where("id",$lesson->id)->where("free_lesson", 1)->get()->count();
//->where("free_lesson",0)

//dd($payment);
if($free_lesson==1){
return $next($request);
}

    if($free_lesson==0 && $payment==1){
    return $next($request);
}

    if($free_lesson==0 && $payment==0){
        return redirect('/')
        ->with(['error' => "You do not have the permission to enter this lesson."]);
    }
   
    }

}

