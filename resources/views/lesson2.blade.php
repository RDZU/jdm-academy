@extends('layouts.lessons')


   <section class="site-hero site-hero-innerpage overlay" data-parallax="true" data-stellar-background-ratio="0.5"  style="background-image: url('{{asset('images/computer-device.jpg')}}');">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1></h1>
              </div>
          </div>
        </div>


</div>
</section>





  <div class="container">
    <div class="row">
        
        <div class="col-sm-12">
             <div class="card card-blog" style="margin-top: -30vh;">
        <div class="card-header">
            
    
 <img class="rounded card-img-top" src="{{asset('images/video.png')}}" style="border-top-style: solid;margin-top: -24px;"  alt="Card image cap"> 
 <!--<div class="embed-responsive embed-responsive-16by9">
 <iframe width="560" height="315" src="https://vimeo.com/345347833"  allowfullscreen></iframe>
	</div> -->


            </div>
  <div class="card-body">

<div class="btn-toolbar d-flex justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
    @if ($previous_lesson)
     <div class="btn-group btn-group-sm   mr-2" role="group" aria-label="First group">
        <a type="button" class="btn btn-success" href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug]) }}"> <i class="fa fa-arrow-circle-left" aria-hidden="true"> {{ $previous_lesson->title }}</i></a>
</div>
    @endif
   
    @if ($next_lesson)
      <div class="btn-group btn-group-sm mr-2" role="group" aria-label="Second group">
        <a type="button" class="btn btn-success" href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->slug]) }}">{{ $next_lesson->title }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
</a>
</div>
    @endif
</div>


        <hr>

 <div class="card card-nav-tabs">
                    <div class="card-header card-header-primary">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" data-toggle="tab">
                                           <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#messages" data-toggle="tab">
                                           <i class="fa fa-book" aria-hidden="true"></i>

                                            support material
                                        </a>
                                    </li>
                                    
                                        <li class="nav-item">
                                        <a class="nav-link" href="#test" data-toggle="tab">
                                          <i class="fa fa-list-ul" aria-hidden="true"></i>
                                            Activity
                                        </a>
    
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="card-body ">
                        <div class="tab-content text-center">
                           
                            <div class="tab-pane active" id="profile">
                                 <div class="row">
                         <div class="col-md-12 ">
                                <div class="staff">
                    
                    <div class="text">
                       <p class="lead"> {!! $lesson->full_text !!}</p>
                    </div>
                </div>
                            </div>
                         
                                </div>
                                </div>
                            <div class="tab-pane" id="messages">
                                @foreach($lesson->getMedia('downloadable_files') as $media)
                                <p class="form-group">
                                    <a href="{{asset($media->getUrl()) }}" target="_blank">{{ $media->name }} ({{ $media->size/1000 }} KB)</a>
                                </p>
                            @endforeach
                                
                            </div>
                            

                            <div class="tab-pane" id="test">
                                @if ($purchased_course || $lesson->free_lesson == 1)
      
        @if ($test_exists)
            <hr />
            <h3 >Test lesson: {{ $lesson->test->title }}</h3>
            @if (!is_null($test_result))
                <div class="alert alert-info">Your test score: {{ $test_result->test_result }}</div>
            @else
            <form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
                {{ csrf_field() }}
                @foreach ($lesson->test->questions as $question)
                <br />
                    <h5>{{ $loop->iteration }}. {{ $question->question }}</h5>
                    @if(!empty($question->question_image))
                  <br>
                     <a href="{{ asset('uploads/'.$question->question_image)}}"><img   src="{{ asset('uploads/'.$question->question_image)}}" class="img-thumbnail" ></a>
                     @endif
                 <div class="funkyradio">
                    @foreach ($question->options as $option)
                <div class="funkyradio-info">
            <input type="radio" name="questions[{{ $question->id }}]" id="radio[{{ $option->id }}]" value="{{ $option->id }}"/>
            <label class="justify-margin" for="radio[{{ $option->id }}]"> {{ $option->option_text }}</label>
        
                  </div>
                    @endforeach
                 </div>
                @endforeach

                <input class="btn btn-primary" type="submit" value="Submit results">
          
            </form>
            @endif
            <hr />
        @endif
    @else
        Please <a href="{{ route('courses.show', [$lesson->course->slug]) }}">go back</a> and buy the course.
    @endif


                            </div>
                        </div>
                    </div>
                </div>


    <div class="list-group">
        @foreach ($lesson->course->publishedLessons as $list_lesson)
            <a class="black" href="{{ route('lessons.show', [$list_lesson->course_id, $list_lesson->slug]) }}" class="list-group-item"
                @if ($list_lesson->id == $lesson->id) style="font-weight: bold" @endif>{{ $loop->iteration }}. {{ $list_lesson->title }}</a>
        @endforeach
    </div>
     
      
  </div>
</div>
            
            </div>
        
  </div>
</div>

    
     <!-- Tabs with icons on Card -->
             
    




  



@section('footer_course')
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
                      <li><a href="{{route('index')}}">Home</a></li>
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
  </body>
</html>
@endsection



