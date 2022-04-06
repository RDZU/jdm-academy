@include('layouts.header')

 <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/architectural.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{trans('about.about')}}</h1>
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
            <h2>{{trans('about.about')}}</h2>
            <p class="lead">{{trans('about.subtitle')}}.</p>
          </div>
        </div>

       <!-- <div class="row d-block">
        <span class="float-left">izquierda</span>
           <span class="float-right">derecha</span>
        </div>
         <div class="row align-items-center">
          
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

        <div class="row mb-5 align-items-center">
          
          <div class="col-md-6 overflow order-1">
            <img src="images/Jose_Diego_Monroy.jpg" alt="" class="img-fluid">
          </div>
          
          <div class="col-md-5 order-3">
            <h2 class="mb-4">{{trans('about.about-author')}}</h2>
            <h3 class="mb-4">{{trans('about.subtitle2')}}</h3>
           <p>{{trans('about.paragraph')}}</p>
           <p>{{trans('about.paragraph2')}}</p>
           
          </div>

        </div>

        <div class="row mb-5 align-items-center">
          
          <div class=" col-md-6 overflow order-3">
            <img src="images/dally+associates.jpg" alt="" class="img-fluid">
          </div>
          
          <div class="col-md-5 order-1">
            <h2 class="mb-4">{{trans('about.title-dally')}}</h2>
            <p>{{trans('about.paragraph-dally')}}</p>
            <div class="about-list">
          <li class="">{{trans('about.list-dally1')}}.</li>
          <li class="">{{trans('about.list-dally2')}}.</li>
         <li class="">{{trans('about.list-dally3')}}.</li>
         <li class="">{{trans('about.list-dally4')}}.</li>
         <li class="">{{trans('about.list-dally5')}}.</li>
        </div>
          </div>

        </div>
        <div class="row mb-5 align-items-center">
          
          <div class="col-md-6 overflow order-1">
            <img src="images/JDM_Group.jpg" alt="ffd" class="img-fluid">
          </div>
        
          <div class="col-md-5 order-3">
           
            <h3 class="mb-4">{{trans('about.title-JDM-group')}}</h3>
            <p>{{trans('about.paragraph-JDM-group')}}</p>
          
           
          </div>

        </div>
      </div>
    </section>
    <!-- END section -->

<!--
    <section class="site-section">
      <div class="trainers">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2>Our Experienced Professor</h2>
              <p class="lead">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 animate-box">
              <div class="trainers-entry">
                <div class="trainer-img" style="background-image: url(images/Ana-Betancourt.jpg)"></div>
                <div class="desc">
                  <h3>Ana Betancourt</h3>
                  <span>B.Sc. Civil Engineering</span>
                </div>
                <p class="justify">Civil Engineering Supervisor for Dally + Associates, has been preforming Civil Engineering since she graduated
                   from Orient University on 2015, before this date she worked on PDVSA, then she worked in several projects
                     until she eventually became the Civil Engineering supervisor for Dally + Associates, Inc. In doing her work 
                    she had to increase her knowledge of AutoCAD,AutoDesk Civil 3D, Microsoft Office Word, Google Sketchup, Sap V14
                     structural and for her current position she has also developed management skills to effectively supervise civil
                      projects.</p>
                <ul class="footer-social">
							
                  <li><a href="#" class="twitter" alt="pagina twiiter academia opcional"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                  
                </ul>
              </div>
            </div>
  
            <div class="col-md-3 col-sm-6 col-xs-6 animate-box">
              <div class="trainers-entry">
                <div class="trainer-img" style="background-image: url(images/Andrea-Martinez.jpg)"></div>
                <div class="desc">
                  <h3>Andrea Martinez</h3>
                  <span>Professor</span>
                </div>
                <p class="justify">Civil Engineering Assistant of Dally + Associates, Inc. Is a Venezuelan, newly graduated civil engineer from 
                  the Orient University (UDO), who has always feel passionate about civil construction, building designs and every
                   other subject related with her career. Over the lasts years she has developed technical skills using AutoCAD,
                    AutoDesk Civil 3D, Project, Microsoff Office Word, Excel, PowerPoint, LuloWin, among others softwares, which 
                    serve her to work for Serviatepe, as a part time project designer while finishing her civil engineer career. </p>
                <ul class="footer-social">
							
                  <li><a href="#" class="twitter" alt="pagina twiiter academia opcional"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                  
                </ul>
              </div>
            </div>
  
            <div class="col-md-3 col-sm-6 col-xs-6 animate-box">
              <div class="trainers-entry">
                <div class="trainer-img" style="background-image: url(images/Jose-Velasquez.jpg)"></div>
                <div class="desc">
                  <h3>Jose Velasquez</h3>
                  <span>Expert Civil 3d</span>
                </div>
                <p class="justify"> Young talent from Venezuela, he is a civil engineer at Dally + Associates, Inc. He started working as a project designer 
                  since 2018. He has always loved reading and learning about new things, on his free time he likes to read about geography
                   and universal history. He is also an English teacher in Metropolitan University (Located at Puerto la Cruz, Venezuela).
                    He has skills in computers programs such AutoCAD, civil 3D, Sketch Up, Photoshop and Windows office suite. As a hobby 
                    he enjoys taking photography and playing videogames on the computer</p>
                <ul class="footer-social">
							
                  <li><a href="#" class="twitter" alt="pagina twiiter academia opcional"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                  
                </ul>
              </div>
            </div>
  
            <div class="col-md-3 col-sm-6 col-xs-6 animate-box">
              <div class="trainers-entry">
                <div class="trainer-img" style="background-image: url(images/Letticia-Brandes.jpg)"></div>
                <div class="desc">
                  <h3>Letticia Brandes</h3>
                  <span>Expert English</span>
                </div>
                <p class="justify">Young talent from Venezuela, she is a civil engineer at Dally + Associates, Inc. She started working as an engineering
                   assistant since 2018. She has always loved reading and learning about new things, on her free time. She likes learning
                    new languages. She’s already learned to speak fluent English, French and Italian. She has skills in computers programs
                     such AutoCAD, civil 3D, ETABS, SAP2000 and Windows Office suite. As a hobby she enjoys listening to music and watching
                      movies</p>
                <ul class="footer-social">
							
                  <li><a href="#" class="twitter" alt="pagina twiiter academia opcional"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
  
  
  
  
    </section> -->
    <!-- END section -->


@include('layouts.footer')