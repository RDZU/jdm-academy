<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class TeacherController extends Controller
{
    


public function show($teacher_slug)
{

$teacher=DB::table('users')->select('*')->where('slug', $teacher_slug)->first();

//dd($teacher->name);



return view('teacher',compact('teacher'));

}
}	