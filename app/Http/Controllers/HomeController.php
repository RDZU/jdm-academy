<?php

namespace App\Http\Controllers;

use App\Course;
use DB;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct(){
   \App::setLocale('es');
}


    public function index()
    {
 // LANGUAGE 
      //$locale = \App::getLocale();
      //dd($locale);
        $purchased_courses = NULL;
        if (\Auth::check()) {
            $purchased_courses = Course::whereHas('students', function($query) {
                $query->where('id', \Auth::id());
            })
            ->with('lessons')
            ->orderBy('id', 'desc')
            ->get();
        }
        $testimonial= DB::table('course_student')->select("course_student.*","users.name","users.user_image", "users.specialized")->join("users","course_student.user_id","users.id")->where('rating',5)->orderBy('user_id', 'desc')->limit(7)->get();
       // dd($testimonial);
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
        return view('index', compact('courses','testimonial', 'purchased_courses'));
     
    }


public function about(){
  return view('about');
    }

public function privacy(){
  return view('privacy-policy');
    }

    public function term(){
  return view('terms-&-conditions');
    }

    public function help(){
  return view('about');
    }

    public function faq(){
  return view('faq');
    }

}
