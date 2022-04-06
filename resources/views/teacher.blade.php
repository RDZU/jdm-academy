@include('layouts.header')
    <!-- END header -->

    <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('images/teacher-unsplash.jpg')}}');">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{$teacher->name}}</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    <section class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="col-md-8 text-center">
           
            
          </div>
        </div>
        <!-- <div class="row align-items-center">
          
          <div class="col-md-5">
            <h2 class="mb-4">First, We Love To Teach</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur reprehenderit laboriosam, eius ipsa consequuntur eos. Nulla dolorem repudiandae mollitia distinctio eos pariatur dolores, voluptate impedit. Eaque quos, sapiente ipsum possimus.</p>
            <p>Odio ducimus id vero tempora eaque rem voluptatibus tempore sequi ea quod, odit commodi voluptas! Nesciunt dolorum ea repudiandae. Officia eos impedit sapiente tempore, a dolore minus eaque culpa facere.</p>
            <p>Qui dolore quaerat expedita fugiat aperiam consequatur pariatur quod perspiciatis alias magni, recusandae esse dolorem beatae commodi quo labore earum harum odio voluptatibus non, error perferendis at delectus. Ab, amet.</p>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-6 overflow">
            <img src="images/img_2.jpg" alt="" class="img-fluid">
          </div>
        </div> -->

        <div class="row mb-6 align-items-center">
          
          <div class="col-md-4 overflow order-1">
              <img class="img-fluid"  src="{{ asset('uploads/'.$teacher->user_image)}}" alt="">
          </div>
          <div class="col-md-1 order-2"></div>
          <div class="col-md-6 order-3">
            <h3 class="">{{$teacher->name}}</h3>
              <span style="color: #96a1af; display: block;">{{$teacher->specialized}}</span>
              <br>
            <p class="justify">{{$teacher->description}}</p>
              <br>
              <h4 class="margin-h4">{{trans('courses.teacher.social-link')}}</h4>
              <ul class="footer-social">  
              <li><a href="{{$teacher->link_twitter}}" class="twitter" alt="pagina twiiter academia opcional"><i class="fa fa-twitter"></i></a></li>
              <li><a href="{{$teacher->link_instagram}}" class="instagram"><i class="fa fa-instagram"></i></a></li>
              <li><a href="{{$teacher->link_facebook}}" class="facebook"><i class="fa fa-facebook"></i></a></li>
            </ul>
          </div>

        </div>

       
        
      </div>
    </section>
    <!-- END section -->

    
    <!-- END section -->

    
   <!--modal de login-->

    <footer class="site-footer" style=" background-image: linear-gradient(-180deg,#26292a 50%, #060608 60%);">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3>{{trans('global.footer.title')}}</h3>
            <ul class="footer-social">
                            
                            <li><a href="#" class="twitter" alt="pagina twiiter academia opcional"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/jdm_academy" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCUojXWlNgGGFAgovykcJ8gA" class="youtube"><i class="fa fa-youtube"></i></a></li>
                            
                        </ul>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="row">
             
             
              <div class="col-md-4 offset-md-4">
                  <ul id="footer" class="list-unstyled">
                      <li><a href="{{route('auth.register')}}">{{trans('global.footer.home')}}</a></li>
                      <li><a href="{{route('about')}}">{{trans('global.footer.about')}}</a></li>
                      <li><a href="{{route('contact')}}">{{trans('global.footer.contact')}}</a></li>
                       <li><a href="contact.html">{{trans('global.footer.login')}}</a></li>
                        <li><a href="contact.html">{{trans('global.footer.register')}}</a></li>
                     
                    </ul>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 ">
            <ul class=" list-inline">
  <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="{{route('privacy-policy')}}">{{trans('global.footer.privacy')}}</a></li>
  <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="{{route('terms-&-conditions')}}">{{trans('global.footer.terms')}}</a></li>
    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">{{trans('global.footer.faq')}}</li>
  </div>
  <div class="col-md-4">
       <img  height="60px" src="{{asset('images/logo_jdmacademy_blanco.png')}}" style="margin-top: -20px;">
       </div>
</ul>


 </div>
 <div class="d-flex justify-content-center">
             <p class="lead-small">
<br>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> {{trans('global.footer.copyright2')}} <i class="" aria-hidden="true"></i>
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