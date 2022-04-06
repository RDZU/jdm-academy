@extends('layouts.courses')

@section('course_head')
@if (Session::has('status'))
  <div class="bg-success" style="padding: 20px;">
    {{Session::get('status')}}
  </div>
  <hr />
@endif
 <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{ asset('uploads/'.$course->course_image)}}');">
  <!-- <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('images/Civil-3D.jpg')}}');"> -->

 <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
<div class="col-md-5 text-center">

            <div class="element-animate">
              <h1 class="titulo-azul">{{$course->title}}</h1>      
            </div>     
          </div>

          @if (\Auth::check())
          @if ($course->students()->where('user_id', \Auth::id())->count() == 0)
           <div class="col-xs-12 col-lg-4">
      <div class="card2 text-xs-center">
        <div class="card-header">
          <h2 class="display-2 titulo-azul"><span class="currency">$</span>{{$course->price}}</h2>
        </div>
        <div class="card-block">
          <h4 class="card-title2"> 
        Plan
          </h4>
          <ul class="list-group">
            <li class="list-group-item">Ultimate Features</li>
            <li class="list-group-item">Extra files included</li>
            <li class="list-group-item">24/7 Support System</li>
          </ul>

          <form action="{{ route('courses.payment') }}" method="POST">
            <input type="hidden" name="course_id" value="{{ $course->id }}" />
            <input type="hidden" name="amount" value="{{ $course->price * 100 }}" />
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_CX29hMTmLsFftGWuWzUTXgMX00h68sL3S9"
                data-amount="{{ $course->price * 100 }}"
                data-currency="usd"
                data-name="Quick LMS"
                data-label="Buy course (${{ $course->price }})"
                data-description="Course: {{ $course->title }}"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="false">
            </script>
            {{ csrf_field() }}
        </form>
          @endif
      @else
      <div class="col-xs-12 col-lg-4">
        <div class="card2 text-xs-center">
          <div class="card-header">
            <h2 class="display-2 titulo-azul"><span class="currency">$</span>{{$course->price}}</h2>
          </div>
          <div class="card-block">
            <h4 class="card-title2"> 
          Plan
            </h4>
            <ul class="list-group">
              <li class="list-group-item">Ultimate Features</li>
              <li class="list-group-item">Extra files included</li>
              <li class="list-group-item">24/7 Support System</li>
            </ul>
            <a href="" class="btn btn-lg btn-block btn-info" data-toggle="modal" data-target="#Login_Modal" type="button">Buy course (${{ $course->price }})</a>
      
      @endif
        </div>
      </div>
    </div>

    <!-- Table #1  -->
   
   </div>
  </div>

            </div>
     </div>
     </div>
     

</section>

<section class="school-features2 d-flex " style="background: linear-gradient(-45deg, #0753b6 0, #1a9554 100%); padding: 0px">

      <div class="inner">
        <div class="media d-block feature2">
          <div class="icon"><span class="flaticon-test"></span></div>
          <div class="media-body">
            <h3 class="mt-0">Published</h3>
            <p class="">{{$course->start_date}}</p>
           
          </div>
        </div>

        <div class="media d-block feature2">
          <div class="icon"><span class="flaticon-notes"></span></div>
          <div class="media-body">
            <h3 class="mt-0">Subject</h3>
            <p> {{$course->subject}}  </p>
          </div>
        </div>

        <div class="media d-block feature2">
          <div class="icon"><span class="flaticon-education"></span></div>
          <div class="media-body">
            <h3 class="mt-0">Level</h3>
            <p> {{$course->level}} </p>
          </div>
        </div>
        

        <div class="media d-block feature2">
          <div class="icon"><span class="flaticon-question"></span></div>
          <div class="media-body">
            <h3 class="mt-0">Idioms</h3>
            <p class=""> {{$course->idiom}}</p>
          </div>
        </div>
        
      </div>
    </section>
    
                          
                        
                            
    <section class="site-section bg-light">
        <div class="container">
          <div class="row ">
           <div class=" col-sm-12">
                <h3><small> </small></h3>
    
                <!-- Tabs with icons on Card -->
                <div class="card card-nav-tabs">
                    <div class="card-header card-header-primary">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                  
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#description" data-toggle="tab">
                                           <i class="fa fa-book" aria-hidden="true"></i>
                                           Description
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#requirement" data-toggle="tab">
                                          <i class="fa fa-list-ul" aria-hidden="true"></i>

                                            Requirements
                                        </a>
    
                                    </li>

                                   @foreach($teacher as $result)
                                    <li class="nav-item">
                                        <a class="nav-link " href="#profile{{ $result->user_id}}" data-toggle="tab">
                                           <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            
                                            <b>Teacher</b> {{ $result->name }}
                                               
                                        </a>
                                    </li>
                                      @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content text-center">
                         <div class="tab-pane active" id="description">
                                <p class="justify"> {!!$course->full_text!!}</p>
                            </div>
                      <div class="tab-pane " id="requirement">
                           <p>
                             {!!$course->requirement!!}
                                  </p>
                                </div>

                          @foreach($teacher as $result)
                            <div class="tab-pane" id="profile{{ $result->user_id}}">
                              <div class="container">
                                 <div class="row">
                         <div class="col-md-12">
                                <div class="staff">
                                  <div class="row">
                    <div class="col-md-4">
                          <img class="img"  src="{{asset('uploads/'.$result->user_image)}}"  alt="">
                        <div class="info ml-4">
                            <h3><a href="{{ route('teacher.show', [$result->slug]) }}">{{$result->name}}</a></h3>
                            <span class="position">{{$result->specialized}}</span>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p>{{$result->description}}</p>
                    </div>
                </div>
                            </div>

                                   </div>
                                </div>    
                                </div>
                                </div>
 @endforeach


                        </div>
                    </div>
                </div>
                </div>
              
 <!--la otra parte -->
          



            </div>
            </div>
      </section>
   
                <!--   CORTE --->

   <section> 
    
        <div class="container">
            <div class="row text-center">
                
               
                
            </div>
            
            <div class="row">
              

 @foreach ($course->publishedLessons as $lesson)
    
     
   

 <div class="col-sm-4">
      <div class="card card-blog">
        <div class="card-header">
            
  <img class="rounded card-img-top" src="{{asset('images/video.png')}}" style="border-top-style: solid;margin-top: -24px;"  alt="Card image cap"
       >
            </div>
  <div class="card-body">
      <h6 class="card-category text-success">
        @if ($lesson->free_lesson)
      <span>
         <i class="fa fa-unlock-alt" aria-hidden="true"> Free</i>
          </span>
          @else
           <span>
         <i class="fa fa-lock" aria-hidden="true"> Pro</i>
          </span>
          <span class="float-right text-gray"></span>
          @endif
      </h6>


      <h4 class="card-title">
         
        @if ($lesson->free_lesson)
        


        @if (\Auth::check())
        <a class="black" href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}">{{ $loop->iteration }} - {{ $lesson->title }}</a>  </h4>
        <p class="card-text">{{ $lesson->short_text }}</p>
         
        <hr>
      <span class="float-left"></span>
    <span class="float-right"><a class="black" href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}"> Start  </a></span>

    @else
    <a href="" class="black" data-toggle="modal" data-target="#Login_Modal" type="button">{{ $loop->iteration }} - {{ $lesson->title }} </a>  </h4>
    <p class="card-text">{{ $lesson->short_text }}</p>
    <hr>
    <span class="float-left"></span>
    <span class="float-right"><a class="black" href="" data-toggle="modal" data-target="#Login_Modal" type="button"> Start   </a></span>

@endif 

    @elseif(!$lesson->free_lesson)

    @if (\Auth::check())
    @if ($course->students()->where('user_id', \Auth::id())->count() == 0)
    <a class="black" href="">{{ $loop->iteration }} - {{ $lesson->title }}</a>  </h4>
    <p class="card-text">{{ $lesson->short_text }}</p>
    <hr>
      <form action="{{ route('courses.payment') }}" method="POST">
            <input type="hidden" name="course_id" value="{{ $course->id }}" />
            <input type="hidden" name="amount" value="{{ $course->price * 100 }}" />
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_CX29hMTmLsFftGWuWzUTXgMX00h68sL3S9"
                data-amount="{{ $course->price * 100 }}"
                data-currency="usd"
                data-name="Quick LMS"
                data-label="Buy course (${{ $course->price }})"
                data-description="Course: {{ $course->title }}"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="false">
            </script>
            {{ csrf_field() }}
        </form>

@else
<a class="black" href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}">{{ $loop->iteration }} - {{ $lesson->title }}</a>  </h4>
<p class="card-text">{{ $lesson->short_text }}</p>
<hr>
<span class="float-left"></span>
<span class="float-right"><a class="black" href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}"> Start 1 </a></span>
@endif
 


@elseif(!\Auth::check())
<a href="" class="black" data-toggle="modal" data-target="#Login_Modal" type="button">{{ $loop->iteration }} - {{ $lesson->title }} </a>  </h4>
<p class="card-text">{{ $lesson->short_text }}</p>
    <hr>
    <span class="float-left"></span>
    <span class="float-right"><a class="black" href="" data-toggle="modal" data-target="#Login_Modal" type="button"> Start  2 </a></span>

    @endif
   
      @endif
  </div>
</div>
</div>
         @endforeach

            </div>
           
            <div class="col-lg-12">
                
                    

                <h4 class="title">Reviews</h4>
                              <hr>
                              <div class="container">
    			
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <div class="rating-block">
                                        <h4>Average user rating</h4>
                                     
                                        <h2 class="bold padding-bottom-7"> {{ $course->rating }} / 5<small></small></h2>
                                        <span class=""><i class="text-warning fa fa-star"></i></span>
                                        <span class=""><i class="text-warning fa fa-star"></i></span>
                                            <span class=""><i class="text-warning fa fa-star"></i></span>
                                            <span class=""><i class="text-warning fa fa-star"></i></span>
                                            <span class=""><i class="text-warning fa fa-star"></i></span>
                                      </div>
                                    </div>
                                    <div class="col-sm-3">
                                      <h4>Rating breakdown</h4>
                                      <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                          <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                          <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;">1</div>
                                      </div>
                                      <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                          <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                          <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;">1</div>
                                      </div>
                                      <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                          <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                          <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;">0</div>
                                      </div>
                                      <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                          <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                          <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;">0</div>
                                      </div>
                                      <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                          <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                          <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;">0</div>
                                      </div>
                                    </div>			
                                  </div>			
                                  <hr>
                                  
                                  
                                  </div>
</section>




                                      <!-- Corte -->


                              @if ($purchased_course)
                <div class="content">
                  <div class="justify-content-lg-center">
                    <h6 class="mb-15 center">Provide Your Rating</h6>
                  </div>
                    <section>
                        <br />
                        <b>Rate the course:</b>
                        <br />
                    <div class="feedeback">
                      <form action="{{ route('courses.rating', [$course->id]) }}" method="post">
                        {{ csrf_field() }}
                        
                            
                       
                        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                            
                          <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                          <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                          <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                          <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                          <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                      </div>
                  
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Your Feedback</label>
                          <textarea name="comment" class="form-control" rows="8" style="background: #f1f9ff;"></textarea>
                        
                        </div>
                        <div class="mt-10 text-right">   
                            <button type="submit" value="Rate" class="btn btn-info"  style="border-radius: 17px; ">Submit</button>
                        
                        </div>
                    </div>
                    
                </div>
              </form>
                @endif

                <div class="container">
                  
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="rounded-circle img-fluid"/>
                                    <p class="text-secondary text-center">15 Minutes Ago</p>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                       <strong>Maniruzzaman Akash</strong>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  
                                   </p>
                                   <div class="clearfix"></div>
                                    <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    <p>
                                       
                                        <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                   </p>
                                </div>
                            </div>
                              
                        </div>
                    </div>
                  </div>

                  @foreach ($comments as $object)
                  <div class="container">
                      <div class="card">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-2">
                                      <img src="{{asset($object->user_image)}}" width="120px" class="rounded-circle img-fluid"/>
                                  <p class="text-secondary text-center">{{$object->created_at}}</p>
                                  </div>
                                  <div class="col-md-10">
                                      <p>
                                         
                                         <strong>{{$object->name}}</strong>
                                          @for ($star = 5; $star >= 1; $star--)
                                          @if ($object->rating >= $star)
                                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                          @else
                                            <span class="float-right"><i class="text-warning fa fa-star-o"></i></span>
                                            @endif
                                          @endfor
                                     </p>
                                     <div class="clearfix"></div>
                                      <p> {{$object->comment}} </p>
                                      <p>
                                         
                                          <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                     </p>
                                  </div>
                              </div>
                                
                          </div>
                      </div>
                    </div>
                    @endforeach
            </div>
    

@endsection


</section>


@section('footer_course')

  <!--modal de login-->
<footer class="site-footer" style=" background-image: linear-gradient(-180deg,#26292a 50%, #060608 60%);">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3>Get to know our social networks</h3>
            <ul class="footer-social">
                            
                            <li><a href="#" class="twitter" alt="pagina twiter academia opcional"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCUojXWlNgGGFAgovykcJ8gA" class="youtube"><i class="fa fa-youtube"></i></a></li>
                            
                        </ul>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="row">
             
             
              <div class="col-md-4 offset-md-4">
                  <ul id="footer" class="list-unstyled">
                      <li><a href="{{route('auth.register')}}">Home</a></li>
                      <li><a href="{{route('about')}}">About Us</a></li>
                      <li><a href="{{route('contact')}}">Contact</a></li>
                       <li><a href="contact.html">Login</a></li>
                        <li><a href="contact.html">Register</a></li>
                     
                    </ul>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 ">
            <ul class=" list-inline">
  <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="{{route('privacy-policy')}}">Privacy Policy</a></li>
  <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="{{route('terms-&-conditions')}}">Terms & Conditions</a></li>
  <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">Help</li>
    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">FAQ</li>
  </div>
  <div class="col-md-4">
       <img  height="60px" src="{{asset('images/logo_jdmacademy_blanco.png')}}" style="margin-top: -20px;">
       </div>
</ul>


 </div>
 <div class="d-flex justify-content-center">
             <p class="lead-small">
<br>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved. <i class="" aria-hidden="true"></i>
</p>
</div>
 </div>
          
        
    </footer>
   <!-- END section -->
    
   
  <!-- END footer -->
    
    
    <!-- loader -->
  

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.0.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>

    <script>
      $(function() {
        $(".stripe-button-el").replaceWith('<button class="btn btn-lg btn-block btn-info" style="color:white;">Buy Now</button>');
      });
    </script>
  </body>
</html>
@endsection

