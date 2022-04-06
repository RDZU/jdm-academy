<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;
use Auth;
use App\Country;
use App\Course;
use Illuminate\Http\Request;
use DB;


class ProfileController extends Controller
{
    

    public function profile(Request $request){
           $purchased_courses = NULL;
        if (\Auth::check()) {
            $purchased_courses = Course::whereHas('students', function($query) {
                $query->where('id', \Auth::id());
            })
            ->with('lessons')
            ->orderBy('id', 'desc')
            ->get();
        }
        $country=DB::table('countries')->select('country_name')->get();
       // $users = DB::table('users')->select('name', 'email as user_email')->get();
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
     
        $user = User::findOrfail(Auth::user()->id);
        //dd($user->country);
       // $lessons = \App\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');
    //   $countries = Country::whereIn('country_id', Auth::user()->country_id)->get()->pluck('country_name', 'id')->prepend('Please select', '');
    //    dd($countries);
       // $countries = Country::get()->pluck('id', Auth::user()->country_id)->prepend('Please select', '');
        //$countries = Country::get()->pluck('country_name', 'id')->prepend('Please select', '');
        $countries = Country::pluck('country_name','id')->prepend('Please select', '');
      //  dd($countries);
        $user= User::findOrfail(\Auth::user()->id);

//dd($user);
    //    $questions_option = QuestionsOption::findOrFail($id);
      //  $get=Country::select('id')->where('country_name',$user->country)->get();
       // dd($get);
        return view('profile',compact('purchased_courses','courses','countries','user'));
    }


public function edit_profile(){
   
    $user = User::findOrfail(Auth::user()->id);
   // $user->fill(Request::all()); selecciona todos los campos del fillable
    //dd($user);
    $user->name = Input::get('name');
    $user->specialized = Input::get('specialized');
    $user->country_id = Input::get('country');
    $user->city = Input::get('city');
    $user->save();
    //reenvia el formulario anteriro
    return redirect()->back();
}


public function account(){
    $purchased_courses = NULL;
    if (\Auth::check()) {
        $purchased_courses = Course::whereHas('students', function($query) {
            $query->where('id', \Auth::id());
        })
        ->with('lessons')
        ->orderBy('id', 'desc')
        ->get();
    }
    $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
    return View('account',compact('purchased_courses','courses'));
}

public function image(){  // vista carga la imagen
    return View('image');
}


public function updateProfile (Request $request){
$rules =['user_image'=>'required|image:1024*1024*1',];
$messages= [
'user_image'=> 'la imagen es requerida',
'user_image'=>'Formato no opermitido',
'user_image'=>'El maximo permitido es 1 mb',
];
$validator=Validator::make($request->all(),$rules,$messages);
//si la validacion falla retornar al formulario anterior con los errores
if($validator->fails()){
    return redirect ('image')->withErrors($validator);
}
else { // cadena aleatoria de30caracteres +elnombre de la img accedemos al siguiente metodo propio de synfony retorna ael tipode archivo
    $name = str_random(30).'-'.$request->file('user_image')->getClientOriginalName();

//mover la imagen a la carpera perfiles
    $request->file('user_image')->move('profiles',$name);
    //actualizar la columna perfil del usuario hacia la nueva ruta de la imagen del perfil
    $user = new User;

    //email sea ingual al usuario q esta autenticado  actualizar la columna perfil asignandole el siguiente valor en la carpeta perfiles concatennado el nombre de la img q esta guardado en la variable name
    $user->where('email', '=', Auth::user()->email) ->update(['user_image' => 'profiles/'.$name]);

            //
                 
                 // rediccionamos al panel de ususario con un estatus 
                 return redirect()->back();
}
}

/*
public function edit_profile($id){

//carga un solo usuario
$user = User::findOrfail($id);
$user->fill(Request::all());
$user->save();
//reenvia el formulario anteriro
return redirect()->back();
}
/*return View('account');


 $user->where('email', '=', Auth::user()->email)->update()
}*/


public function update(){


}

}