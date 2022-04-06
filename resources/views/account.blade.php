@include('layouts.header')


<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('images/teacher-unsplash.jpg')}}');">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1> </h1>
            </div>
          </div>
        </div>
      </div>
    </section>


 <section class="site-section bg-light">


  @if (!is_null($purchased_courses))
  <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
          <h2>{{trans('user.account.your-courses')}}</h2>
        
        </div>
      </div>
      <div class="row top-course">
  @foreach($purchased_courses as $course)
  
      <div class="col-sm-12 col-lg-4 col-md-6">
          <div class="card card-blog">
              <div class="card-header">
        <img class="rounded card-img-top" src="{{ asset('uploads/'.$course->course_image)}}" style="border-top-style: solid;margin-top: -24px;"  alt="Card image cap">
             
            </div> <!-- card-header -->
            <div class="card-body">
                <h6 class="card-category text-success"></h6>
                <h3 class="card-title"><a class="black" href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a></h3>

                <p class="card-text">{{ $course->description }}</p>
          
                <div class="ratings">
                    <p>{{trans('user.account.progress')}}: {{ Auth::user()->lessons()->where('course_id', $course->id)->count() }}
                      {{trans('user.account.of')}} {{ $course->lessons->count() }} {{trans('user.account.lessons')}}</p>
                </div>
            </div>      <!-- card-body -->
          </div>  <!-- card-blog -->
      </div>  <!-- col -->
  @endforeach
  </div> <!-- row -->
  <hr />
</div>
@endif



    </section>
@include('layouts.footer')