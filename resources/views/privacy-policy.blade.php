@include('layouts.header')


<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/banner-bg.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{trans('privacy-policy.title.name')}}</h1>
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


<p>{{trans('privacy-policy.body.intro')}}<a href = "mailto:info@jdm-academy.com">info@jdm-academy.com</a> </p>
<hr>
<h3><strong>{{trans('privacy-policy.body.subtitle1')}}</strong></h3>

<p>{{trans('privacy-policy.body.body1')}}</p>
<hr>
<h3><strong>{{trans('privacy-policy.body.subtitle2')}}</strong></h3>
<p>{{trans('privacy-policy.body.body2')}}.</p>
<hr>

<h3><strong>{{trans('privacy-policy.body.subtitle3')}}<strong></h3>
<p>{{trans('privacy-policy.body.body3')}} &ndash; <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>

<hr>
<h3><strong>{{trans('privacy-policy.body.subtitle4')}}</strong></h3>
<p>{!!trans('privacy-policy.body.body4')!!}.</p>

<hr>
<h3><strong>{{trans('privacy-policy.body.subtitle5')}}</strong></h3>
<p>{{trans('privacy-policy.body.body5')}}</p>
<hr>
<h3><strong>{{trans('privacy-policy.body.subtitle6')}}</strong></h3>
<p>{{trans('privacy-policy.body.body6')}}.</p>
<hr>
<h3><strong>{{trans('privacy-policy.body.subtitle7')}}<strong></h3>
<p>{{trans('privacy-policy.body.body7')}}.</p>
<hr>
<h3><strong>{{trans('privacy-policy.body.subtitle8')}}</strong></h3>
<p>{{trans('privacy-policy.body.body8')}}.</p>

  
    
     
      
  </div>
</div>
            
            </div>
        
  </div>
</div>


@include('layouts.footer')