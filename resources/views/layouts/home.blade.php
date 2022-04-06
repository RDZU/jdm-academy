@include('layouts.header')

   <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/page_main.jpg); background-position: 0px 0px; '">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-5 text-center">

            <div class="element-animate">
              <h1 class="titulo-azul">JDM Academy</h1>
              <p class="lead">{{trans('global.title2')}}.</p>
             
            </div>

          </div>

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
            {!! Form::open(['route' => 'auth.register']) !!}
           
             
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

            {!! Form::close() !!}
       
          </div>
          </div>
        </div>
      </div>
@endif


    </section>

    <section class="school-features d-flex" style="background: linear-gradient(-70deg, #028eab 0, #284996 80%);">

      <div class="inner">
        <div class="media d-block feature">
          <div class="icon"><span class="flaticon-video-call"></span></div>
          <div class="media-body">
            <h3 class="mt-0">{{trans('global.banner.sec1')}}</h3>
            <p>{{trans('global.banner.text1')}}.</p>
          </div>
        </div>

        <div class="media d-block feature">
          <div class="icon"><span class="flaticon-student"></span></div>
          <div class="media-body">
            <h3 class="mt-0">{{trans('global.banner.sec2')}}</h3>
            <p>{{trans('global.banner.text2')}}.</p>
          </div>
        </div>

        <div class="media d-block feature">
          <div class="icon"><span class="flaticon-video-player-1"></span></div>
          <div class="media-body">
            <h3 class="mt-0">{{trans('global.banner.sec3')}}</h3>
            <p>{{trans('global.banner.text3')}}.</p>
          </div>
        </div>

        


        <div class="media d-block feature">
          <div class="icon"><span class="flaticon-audiobook"></span></div>
          <div class="media-body">
            <h3 class="mt-0">{{trans('global.banner.sec4')}}</h3>
            <p>{{trans('global.banner.text4')}}.</p>
          </div>
        </div>

        
      </div>
    </section>

      <section class="site-section">
      <div class="container">
        <section class="school-features text-dark d-flex">

          <div class="inner">
            <div class="media d-block feature">
              <div class="icon"><span class="flaticon-student-1"></span></div>
              <div class="media-body">
                <h3 class="mt-0">{{trans('global.banner_down.sec1')}}</h3>
                <p>{{trans('global.banner_down.text1')}}.</p>
              </div>
            </div>

            <div class="media d-block feature">
              <div class="icon"><span class="flaticon-geography"></span></div>
              <div class="media-body">
                <h3 class="mt-0">{{trans('global.banner_down.sec2')}}</h3>
                <p>{{trans('global.banner_down.text2')}}.</p>
              </div>
            </div>

            <div class="media d-block feature">
              <div class="icon"><span class="flaticon-book"></span></div>
              <div class="media-body">
                <h3 class="mt-0">{{trans('global.banner_down.sec3')}}</h3>
                <p>{{trans('global.banner_down.text3')}}.</p>
              </div>
            </div>


            <div class="media d-block feature">
              <div class="icon"><span class="flaticon-interface"></span></div>
              <div class="media-body">
                <h3 class="mt-0">{{trans('global.banner_down.sec4')}}</h3>
                <p>{{trans('global.banner_down.text4')}}.</p>
              </div>
            </div>
          </div>
        </section>

       

      </div>
    </section>
   

    <section class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2>{{trans('global.section-course.title')}}</h2>
            <p class="lead">{{trans('global.section-course.subtitle')}}</p>
          </div>
        </div>
        <div class="row top-course">
         
          
          @yield('main')
          
        </div>
      </div>
    </section>

 <section id="testimonials">
            
      <div id="testimonials-cover" class="bg-parallax">
          <div class="content-box">

              <div class="content-title content-title-white wow animated fadeInDown" data-wow-delay="1s" data-wow-delay=".5s">
                  <h3>{{trans('global.section-student')}}</h3>
                  <div class="content-title-underline"></div>
              </div>

              <div class="container">

                  <div class="row wow animated bounceInDown" data-wow-delay="1s" data-wow-delay=".5s">
                      <div class="col-md-12">
                          <div id="customers-testimonials" class="text-center owl-carousel owl-theme">

                              

                              <div class="testimonial">

                                  <img src="images/client/client-2.jpg" class="img-responsive rounded-circle" alt="Testinomials">
                                  <blockquote>

<p>Very good course, concrete and concise.</p>

                                  </blockquote>
                                  <div class="testimonials-author">
                                      <span class=""><i class="text-warning fa fa-star"></i></span>
                                      <span class=""><i class="text-warning fa fa-star"></i></span>
                                    <span class=""><i class="text-warning fa fa-star"></i></span>
                                    <span class=""><i class="text-warning fa fa-star"></i></span>
                                    <span class=""><i class="text-warning fa fa-star"></i></span>
                                      <p>
                                          <strong>Jhon Perez</strong>
                                          <span>Arquitect</span>
                                      </p>
                                  </div>

                              </div>

                              <div class="testimonial">

                                  <img src="images/client/client-3.jpg" class="img-responsive rounded-circle" alt="Testinomials">
                                 
                                  <blockquote>
                                   
                                      <p>Good introduction to the course, with the basics of Civl 3D.</p>

                                  </blockquote>
                                  <div class="testimonials-author">
                                      <span class=""><i class="text-warning fa fa-star"></i></span>
                                      <span class=""><i class="text-warning fa fa-star"></i></span>
                                    <span class=""><i class="text-warning fa fa-star"></i></span>
                                    <span class=""><i class="text-warning fa fa-star"></i></span>
                                    <span class=""><i class="text-warning fa fa-star-o"></i></span>
                                      <p>
                                          <strong>Sara Perez</strong>
                                          <span>B.Sc. Civil Engineering</span>
                                      </p>
                                  </div>

                              </div>
                              @foreach ($testimonial as $obj)
                              <div class="testimonial">

                                  <img src="{{asset($obj->user_image)}}" class="img-responsive rounded-circle" alt="Testinomials" width="120px" height="120px">
                                  <blockquote>

                                      <p>{{$obj->comment}}</p>

                                  </blockquote>
                                  <div class="testimonials-author">

                                      @for ($star = 1; $star <= 5; $star++)
                                      @if ($obj->rating >= $star)
                                      <span class=""><i class="text-warning fa fa-star"></i></span>
                                      @else
                                      <span class=""><i class="text-warning fa fa-star-o"></i></span>
                                      @endif
                                  @endfor
                                      <p>
                                      <strong>{{$obj->name}}</strong>
                                          <span>{{$obj->specialized}}</span>
                                      </p>
                                  </div>

                              </div>
                              @endforeach


                          </div>
                      </div>
                  </div>

              </div>

          </div>
      </div>
  </section>


                
@include('layouts.footer')
