@include('layouts.header')


<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/banner-bg.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{trans('global.book')}}</h1>
              </div>
          </div>
        </div>
</div>
</section>



 <p class="justify"> {{$books->title}}</p>
 <p class="justify"> {{$books->authors}}</p>
 <p class="justify"> {{$books->description}}</p>
  <p class="justify"> {{$books->full_text}}</p>
 <p class="justify"> {{$books->subject}}</p>
 <p class="justify"> {{$books->editorial}}</p>
 <p class="justify"> {{$books->edition}}</p>
 <a href="{{ asset(env('UPLOAD_PATH').'/uploads/' . $books->file) }}" target="_blank">({{ $books->size/1000 }} KB)</a>

 


