<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Question;
use App\QuestionsOption;
use App\TestsResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Validator;



class LessonsController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
       
        

    }

    public function show($course_id, $lesson_slug)
    {
        $lesson = Lesson::where('slug', $lesson_slug)->where('course_id', $course_id)->firstOrFail();

        if (\Auth::check())
        {
            if ($lesson->students()->where('id', \Auth::id())->count() == 0) {
                $lesson->students()->attach(\Auth::id());
            }
        }
//dd($lesson->id);
        $test_result = NULL;
        if ($lesson->test) {
            $test_result = TestsResult::where('test_id', $lesson->test->id)
                ->where('user_id', \Auth::id())
                ->first();
        }

        $previous_lesson = Lesson::where('course_id', $lesson->course_id)
            ->where('position', '<', $lesson->position)
            ->orderBy('position', 'desc')
            ->first();
        $next_lesson = Lesson::where('course_id', $lesson->course_id)
            ->where('position', '>', $lesson->position)
            ->orderBy('position', 'asc')
            ->first();

        $purchased_course = $lesson->course->students()->where('user_id', \Auth::id())->count() > 0;
        $test_exists = FALSE;

        if ($lesson->test && $lesson->test->questions->count() > 0) {

            $test_exists = TRUE;

        }
        //dd($lesson->test->questions->count());
           // dd($lesson->id);

           /*$comments = App\Comments::select()->where('lesson_id',$lesson->id)->orderBy('id', 'desc')->get();
           dd("mostrar msm
           ");*/
        return view('lesson', compact('lesson', 'previous_lesson', 'next_lesson', 'test_result',
            'purchased_course', 'test_exists'));
    }

    public function test($lesson_slug, Request $request)
    {
        $lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();
        //dd($lesson);
        $answers = [];
        $test_score = 0;
        foreach ($request->get('questions') as $question_id => $answer_id) {
            $question = Question::find($question_id);
            $correct = QuestionsOption::where('question_id', $question_id)
                ->where('id', $answer_id)
                ->where('correct', 1)->count() > 0;
            $answers[] = [
                'question_id' => $question_id,
                'option_id' => $answer_id,
                'correct' => $correct
            ];
            if ($correct) {
                $test_score += $question->score;
            }
            /*
             * Save the answer
             * Check if it is correct and then add points
             * Save all test result and show the points
             */
        }
        $test_result = TestsResult::create([
            'test_id' => $lesson->test->id,
            'user_id' => \Auth::id_user(),
            'test_result' => $test_score
        ]);
        $test_result->answers()->createMany($answers);

        return redirect()->route('lessons.show', [$lesson->course_id, $lesson_slug])->with('message', 'Test score: ' . $test_score);
    }

/*
    public function createComment(Request $request){
    
    $comment = e($request->comment);
        $date = date('Y-m-d');
        $time = date('H:m:s');
        //dd($request->lesson_id);
        $lesson_id=56;
       // 
        Comments::insert([
            'comment' => $comment,
            'id_user' => Auth::user()->id,
            'date' => $date,
            'time' => $time,
            'lesson_id' => $request->lesson_id
        ]);
       // return redirect()->('lesson.show')->with('status', 'Enhorabuena comentario publicado con éxito');
       
        return view('test2');
        
    }*/

/*
    public function editComment(Request $request){
        $rules = ['id_comment' => 'integer'];
        $comment = e($request->comment);
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()){
            return view('test2');//->with('error', 'Ha ocurrido un error');
        } else{
            if (Comments::where('id', '=', $request->id_comment)
    
                    ->where('id_user', '=', Auth::user()->id)
                    ->update(['comment' => $comment]))
                    
                    {       //  dd(Auth::user()->id);
                return view('test2');//->with('status', 'Enhorabuena comentario editado correctamente');
            }else{
                return view('test2');//->with('error', 'Ha ocurrido un error');
            }
        }*/
    


    /*public function deleteComment(Request $request){
        $rules = ['id_comment' => 'integer'];
        $validator = Validator::make($request->only('id_comment'), $rules);
        if ($validator->fails()){
            return view('test2');
           // return redirect('test2');//->with('error', 'Ha ocurrido un error');
        }
        else
        {
            if(Comments::where('id', '=', $request->id_comment)
                    ->where('id_user', '=', Auth::user()->id)->delete()
                    ){
                        return view('test2');
             //   return redirect('test2');//->with('status', 'Enhorabuena comentario eliminado con éxito');
            }
            else{
                return view('test2');
              //  return redirect('test2');//->with('error', 'Ha ocurrido un error');  
            }
        }
}*/

}
