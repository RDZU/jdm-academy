<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use App\User;
use Auth;
use DB;

class CoursesController extends Controller
{
  

    public function show($course_slug)
    {

      
        
       // $teacher = \App\User::whereHas('role', function ($q) { $q->where('role_id', 2); } )->get()->pluck('name', 'id','description','specialized');
        $course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
        $id= DB::table('courses')->where('slug',$course_slug)->select('id')->value('id'); /// obtener el id del curso 9


$teacher=DB::select("select users.name,users.user_image, users.slug,users.description,users.specialized, course_user.user_id, course_user.user_id from `course_user` 
join users on course_user.user_id=users.id
join role_user on users.id=role_user.user_id
where course_user.course_id = $id and role_user.role_id=2;"); //obtener los profesores registrados en el curso
 

/*
        $course_teacher=DB::table('course_user')->select('user_id')->where('course_id',$id)->get();
       dd($course_teacher);*/
     //  dd($course->students()->where('user_id', \Auth::id())->count() == 0);
     $comments = DB::table('course_student')->select("course_student.*","users.name","users.user_image")->join("users","course_student.user_id","users.id")->where("rating","<>",0)->whereNotNull('comment')->where('course_id',$id)->orderBy('user_id', 'desc')->get();
    
    // dd($comments);
        $purchased_course = \Auth::check() && $course->students()->where('user_id', \Auth::id())->count() > 0;
        if (Auth::check()) {
           $validate_if_comment=DB::table("course_student")->where("course_id",$id)->where("user_id",Auth::user()->id)->exists();
    }

    $rating1=DB::table("course_student")->where("course_id",$id)->where("rating",1)->count();
    $rating2=DB::table("course_student")->where("course_id",$id)->where("rating",2)->count();
    $rating3=DB::table("course_student")->where("course_id",$id)->where("rating",3)->count();
    $rating4=DB::table("course_student")->where("course_id",$id)->where("rating",4)->count();
    $rating5=DB::table("course_student")->where("course_id",$id)->where("rating",5)->count();
    $totalrating=DB::table("course_student")->where("course_id",$id)->where("rating","<>",0)->whereNotNull('comment')->count();
    //dd($totalrating);
  //  $totalrating == 0 ? 3 : 5;
    // dd($totalrating);
    //dd($rating4*100/$totalrating);
    //select count(rating) from course_student where course_id=7 and rating=4
        //select count(rating) from course_student where course_id=7
      // dd( $validate_if_comment);
    //
$totalrating5=$totalrating==0 ? 0 : $rating5*100/$totalrating;
$totalrating4=$totalrating==0 ? 0 : $rating4*100/$totalrating;
$totalrating3=$totalrating==0 ? 0 : $rating3*100/$totalrating;
$totalrating2=$totalrating==0 ? 0 : $rating2*100/$totalrating;
$totalrating1=$totalrating==0 ? 0 : $rating1*100/$totalrating;
//dd($totalrating5);
      /*  RATING COURSES */

        return view('course', compact('course', 'purchased_course','teacher','comments','rating1','rating2','rating3','rating4','rating5','totalrating','totalrating5','totalrating4','totalrating3','totalrating2','totalrating1'));

        
    }


public function teacher($teacher_slug){
    
    return view('teacher',compact('teacher_slug'));

}

    public function payment(Request $request)
    {
     $course = Course::findOrFail($request->get('course_id'));
       $this->createStripeCharge($request);

        $course->students()->attach(\Auth::id());

        return redirect()->back()->with('success', 'Payment completed successfully.');
    }

    private function createStripeCharge($request)
    {
        Stripe::setApiKey('sk_test_7F2x7Oi7dHAiQmEDFatBvjok00SGbZ0KdE');

        try {
            $customer = Customer::create([
                'email' => $request->get('stripeEmail'),
                'source'  => $request->get('stripeToken')
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $request->get('amount'),
                'currency' => "usd"
            ]);
        } catch (\Stripe\Error\Base $e) {
            return redirect()->back()->withError($e->getMessage())->send();
        }
    }

    public function rating($course_id, Request $request)
    {

        $course = Course::findOrFail($course_id); /* recupera el primer resultado de la consulta, sino falla */

        $course->students()->updateExistingPivot(\Auth::id(), ['rating' => $request->get('rating'),'comment' => $request->get('comment')]);

        return redirect()->back()->with('success', 'Thank you for rating.');
    }

}
