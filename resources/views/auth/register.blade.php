@include('layouts.header')

   <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/architect.jpg); width:100%; height:100%; '">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
       

          @if (!Auth::check()) 
          <div class="col-md-6">
<div class="card-deck mb-2">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            
          </div>
          <div class="card-body">



                <div class="text-center">
                
                  <div class="text-center">
              <p class="login"> {{trans('global.register2')}}</p>
              <a class="btn btn-social-icon btn-xs btn-linkedin" href="{{route('login.linkedin') }}" onclick=""><span class="fa fa-linkedin"></span></a>
               <a class="btn btn-social-icon btn-xs btn-google" href="{{route('login.google') }}" onclick=""><span class="fa fa-google"></span></a>
                <a class="btn btn-social-icon btn-xs btn-facebbok" href="{{route('login.facebook') }}" style="background-color:#3b5998; border-radius: 50%;" onclick=""><span class="fa fa-facebook"></span></a>
              
            </div>
                   
                </div>

<hr>

          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
          <input type="hidden" name="redirect_url" value="{{ request('redirect_url', '/') }}">


<div class="input-group mb-2 mr-sm-2{{ $errors->has('name') ? ' has-error' : '' }}">
 <div class="input-group-prepend">
   <div class="input-group-text"><span class="fa fa-user" style="color: black;"></span></div>
 </div>
<input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{ old('name') }}" placeholder="{{trans('global.contact.fields.full-name')}}" required autofocus>

                            
</div>

<br>
<div class="input-group mb-2 mr-sm-2{{ $errors->has('email') ? ' has-error' : '' }} ">
   <div class="input-group-prepend">
 <div class="input-group-text"><span class="fa fa-envelope" style="color: black;"></span></div>
</div>
<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="{{trans('global.enroll.email')}}" required>

                           
</div>
<br>

<div class="input-group mb-2 mr-sm-2{{ $errors->has('password') ? ' has-error' : '' }}">
<div class="input-group-prepend">
  <div class="input-group-text"><span class="fa fa-lock" style="color: black;"></span></div>
</div>
<input type="password" class="form-control" id="password" name="password" placeholder="{{trans('global.enroll.password')}}">
                           
</div>
<br>
<div class="input-group mb-2 mr-sm-2">
  <div class="input-group-prepend">
 <div class="input-group-text"><span class="fa fa-lock" style="color: black;"></span></div>
</div>
<input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="{{trans('global.contact.fields.password2')}}" required>
</div>

<br>

        <button type="submit" class="btn btn-lg btn-block btn-info">{{trans('global.contact.fields.register')}}</button>
        </form>
          </div>
          </div>
        </div>
      </div>
@endif


    </section>

     
       

     



                
@include('layouts.footer')
