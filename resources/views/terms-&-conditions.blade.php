@include('layouts.header')

<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/banner-bg.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{trans('terms.title.name')}}</h1>
            </div>
          </div>
        </div>
</div>
</section>




<div class="container">
    <div class="row">
        
        <div class="col-sm-12">
             <div class="card card-blog" style="margin-top: -2vh;">
        <div class="card-header">
            
    
 


            </div>
  <div class="card-body">


<p>{{ trans('terms.body.intro')}}.</p>
<p>{{ trans('terms.body.intro2')}}.</p>
<p>{{ trans('terms.body.intro3')}}.</p>
<hr>
<h3><strong>{{ trans('terms.body.subtitle1')}}</strong></h3>
<p>{{ trans('terms.body.body1')}}.</p>
<hr>
<h3><strong>{{ trans('terms.body.subtitle2')}}</strong></h3>
<p>{!!trans('terms.body.body2')!!}.</p>
<hr>
<h3><strong>{{trans('terms.body.subtitle3')}}</strong></h3>
<p>{!! trans('terms.body.body3')!!}.</p>

<hr>
<h3><strong>{{trans('terms.body.subtitle4')}}</strong></h3>
<p>{{trans('terms.body.body4')}}.</p>
<hr>
<h3><strong>{{trans('terms.body.subtitle5')}}</strong></h3>
<p>{{trans('terms.body.body5')}}.</p>
<hr>
<h3><strong>{{trans('terms.body.subtitle6')}}</strong></h3>
<p>{{trans('terms.body.body6')}}.</p>
<hr>
<h3><strong>{{trans('terms.body.subtitle7')}}</strong></h3>
<p>{{trans('terms.body.body7')}}.</p>
<hr>
<h3><strong>{{trans('terms.body.subtitle8')}}</strong></h3>
<p>{!! trans('terms.body.body8')!!}.</p>
  

 


  
    
     
      
  </div>
</div>
            
            </div>
        
  </div>
</div>



@include('layouts.footer')