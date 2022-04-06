
@extends('layouts.home')

@section('main')

    
    
    <div class="row">
    @foreach($courses as $course)
        <div class="col-sm-12 col-lg-4 col-md-6">

                  <div class="card card-blog">
        <div class="card-header">
  <img class="rounded card-img-top" src="{{ asset('uploads/'.$course->course_image)}}" style="border-top-style: solid;margin-top: -24px;"  alt="Card image cap">


                    <span class="price-course text-center"><small>{{trans('global.free')}}</small></span>
                     </div> <!-- card-header -->
<div class="card-body">
      <h6 class="card-category text-success"></h6>

<h3 class="card-title"><a class="black btn-disabled" href="#">{{ $course->title }}</a></h3>
                    <p class="card-text">{{ $course->description }}</p>
                    <a class="black" href="#" class="float-left">Learn most<i class="fa fa-arrow-right"> </i></a>
                    <span class="float-right text-gray">{{ $course->lessons->count() }} lessons</span>
                    <br>
<hr>
            

                <div class="ratings">
                    <p class="pull-right text-gray">Students: {{ $course->students()->count() }}</p>
                    <p>
                        @for ($star = 1; $star <= 5; $star++)
                            @if ($course->rating >= $star)
                            <span class=""><i class="text-warning fa fa-star"></i></span>
                            @else
                            <span class=""><i class="text-warning fa fa-star-o"></i></span>
                            @endif
                        @endfor
                    </p>
                </div>  <!-- ratings -->
                 
            </div>      <!-- card-body -->
        </div>          <!-- card-blog -->
   
    </div>              <!-- col -->
     @endforeach
</div>                  <!-- row  -->
@endsection

 
