<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title>{{ $page_title or 'JDM Academy  Alpha' }}</title>
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">
    

     <!-- <link href="{{asset('css/creative-tim.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>
<header role="banner">
     
      <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-light">
        <div class="container"> 
       
          <img  height="60px" src="{{asset('images/logo_jdmacademy.png')}}"> 
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
           <i class="fa fa-bars" aria-hidden="true"></i>

          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{route('index') }}"><i class="fa fa-home" aria-hidden="true"> {{trans('global.home')}}</i>
</a>
              </li>
              {{--
              <li class="nav-item  dropdown">
                <a class="nav-link  dropdown-toggle" href="courses.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-book" aria-hidden="true"> {{trans('global.courses.title')}}</i></a>
                <div class="dropdown-menu " aria-labelledby="dropdown04">
                   @foreach($dropdown as $course)
                  <a class="dropdown-item " href="{{ route('courses.show', [$course->slug])}}" >{{$course->title }}</a>
                  @endforeach
                </div>

              </li>

              --}}
           <li class="nav-item ">
                  <a class="nav-link" href="{{route('book')}}"><i class="fa fa-book" aria-hidden="true"> {{trans('global.book')}}</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}"><i class="fa fa-info-circle" aria-hidden="true">{{trans('global.about')}}</i>
</a>
              </li>
              <li class="nav-item">
  <a class="nav-link" href="{{route('contact') }}"><i class="fa fa-comment" aria-hidden="true">{{trans('global.contact.title2')}}</i></a>
              </li>
              <li class="nav-item">
                @foreach (array_keys(config('locale.languages')) as $lang)
                         @if ($lang != App::getLocale())
                             <a class="nav-link" href="{!! route('lang.swap', $lang) !!}">
                              <i class="fa fa-language" aria-hidden="true"></i>
                                     {!! $lang !!} <small>{!! $lang !!}</small>
                                     

                             </a>
                         @endif
                     @endforeach
               </li>
            </ul>

            <ul class="navbar-nav absolute-right">
            
             
 @if (Auth::check()) 

   <li class="nav-item">
<div class="btn-group">
  <button class="btn btn-outline-secondary btn-sm " type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Profile <i class="fa fa-sort-desc" aria-hidden="tru"> </i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
    <a class="dropdown-item" href="{{route('account')}}">Account</a>
    
   {{-- <div class="dropdown-divider"></div>
    <a class="dropdown-item disabled" href="#" onclick="return false;">Separated link</a> --}}
  </div> 
</div>
     </li>
 <li class="nav-item">
<form action="{{ route('auth.logout') }}" method="post">
                                {{ csrf_field() }}
   <button type="submit" class="btn btn-info btn-sm" type="button"><i class="fa fa-sign-out" aria-hidden="true"> Logout</i></button>
  </form>
  </li>
 
 @else
  <li class="nav-item">
                 <button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#Login_Modal" type="button"><i class="fa fa-sign-in" aria-hidden="true"> {{trans('global.login')}}</i></button>
               </li>
              <li class="nav-item">
                 <a href="{{route('auth.register') }}"><button  class="btn btn-info btn-sm" type="button"><i class="fa fa-user-plus" aria-hidden="true"> {{trans('global.register')}}</i></button></a>
               
              </li>
                @endif

            </ul>
            
          </div>

        </div>

      </nav>
      @if (count($errors) > 0)
                        <div class="alert alert-danger" style="margin-top: 80px; text-align: center;">
                          <strong>Whoops!</strong> {{trans('global.msm-trouble')}}
                            <br><br>
                            <ul>
                       
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>
                        </div>
                    @endif  
    </header>



<!-- /.modal star here -->

      <div class="modal fade" tabindex="-1" role="dialog" id="Login_Modal">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #17a2b8;"> 

          <h4 class="modal-title  w-100 text-center" style="color: white"> <i class="fa fa-sign-in"> Log in </i></h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
            </button>
      
      </div>
       @if (Auth::check())

       
       @else
      <form method="post" action="{{route('auth.login')}}" id="">

         {{ csrf_field() }}
      <div class="modal-body">   
       <div class="text-center">
              <p class="login"> {{trans('global.enroll.title1')}}</p>
              <a class="btn btn-social-icon btn-xs btn-linkedin" href="{{route('login.linkedin') }}" onclick=""><span class="fa fa-linkedin"></span></a>
               <a class="btn btn-social-icon btn-xs btn-google" href="{{route('login.google') }}" onclick=""><span class="fa fa-google"></span></a>
                <a class="btn btn-social-icon btn-xs btn-facebbok" href="{{route('login.facebook') }}" style="background-color:#3b5998; border-radius: 50%;" onclick=""><span class="fa fa-facebook"></span></a>
               
            </div>
<hr>


         

 <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
  
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><path><span class="fa fa-envelope" style="color: black;"></span></div>
    </div>
    <input type="text" class="form-control" id="email" name="email" placeholder="{{trans('global.enroll.email')}}" required>
  </div>

<br>
<div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><span class="fa fa-lock" style="color: black;"></span></div>
    </div>
    <input type="password" class="form-control" id="password" name="password" placeholder="{{trans('global.enroll.password')}}" required>
  </div>

<hr>


       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-close"> {{trans('global.enroll.close')}}</i></button>

        <button type="submit" value="Login" class="btn btn-info"><i class="fa fa-sign-in"> {{trans('global.enroll.login')}} </i></button>
      </div>
      </form>
      @endif
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->