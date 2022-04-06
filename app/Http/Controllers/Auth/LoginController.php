<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Socialite;
use Auth;
use App\User;
use App\Social;
use Exception;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    
//FACEBOOK
   /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();  
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
       // dd($user);
          if ($the_user = User::select()->where('email', '=', $user->email)->first())
             {
                 Auth::login($the_user);
             }  else{
                 $new_user = new User;
                 $new_user->name = $user->name;
                 $new_user->email = $user->email;
                 $new_user->user_image = $user->avatar;
                // $new_user->active = 1;
                 $new_user->social = 1;
                 $new_user->save();
                 Auth::login($new_user);
                 
                 //Registrar Información extra
                $social = new Social;
                $social->user_id = $new_user->id;
                 $social->provider = 'facebook';
                 $social->uid_provider = $user->id;
                 $social->save();
             }
             return redirect()->back();//redirect('/');
    }
// GOOGLE
public function redirectToProviderGoogle(){
return Socialite::driver('google')->redirect();
}
 public function handleProviderCallbackGoogle(){
           $user = Socialite::driver('google')->stateless()->user();

      //  dd($userSocial);
            if ($the_user = User::select()->where('email', '=', $user->email)->first())
             {
                 Auth::login($the_user);
             }  else{
                 $new_user = new User;
                 $new_user->name = $user->name;
                 $new_user->email = $user->email;
                 $new_user->user_image = $user->avatar;
                // $new_user->active = 1;
                 $new_user->social = 1;
                 $new_user->save();
                 Auth::login($new_user);
                 
                 //Registrar Información extra
                $social = new Social;
                $social->user_id = $new_user->id;
                 $social->provider = 'google';
                 $social->uid_provider = $user->id;
                 $social->save();
             }
            return redirect()->back();//redirect('/');
    }

//LINKEDIN
public function redirectToProviderLinkedin(){
   return Socialite::driver('linkedin')->redirect();
}

public function handleProviderCallbackLinkedin(){
    $user = Socialite::driver('linkedin')->stateless('true')->user();
    //    dd($user);

          if ($the_user = User::select()->where('email', '=', $user->email)->first())
             {
                 Auth::login($the_user);
             }  else{
                 $new_user = new User;
                 $new_user->name = $user->name;
                 $new_user->email = $user->email;
                 $new_user->user_image = $user->avatar;
                // $new_user->active = 1;
                 $new_user->social = 1;
                 $new_user->save();
                 Auth::login($new_user);
                 
                 //Registrar Información extra
                $social = new Social;
                $social->user_id = $new_user->id;
                 $social->provider = 'LinkedIn';
                 $social->uid_provider = $user->id;
                 $social->save();
             }
           return redirect()->back();//redirect('/');
}




}
