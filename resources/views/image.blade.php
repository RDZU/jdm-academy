@include('layouts.header')

<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('images/banner.jpg')}}');"> 
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{Auth::user()->name}}</h1>
              </div>
          </div>
        </div>
</div>
</section>

<br><br><br>


<h1>Add / Change Image:</h1>
<form method='post' action='{{asset("updateprofile")}}' enctype='multipart/form-data'>
	{{csrf_field()}}
	<div class='form-group'>
		<label for='user_image'>Imagen: </label>
		<input type="file" name="user_image"/>
		<div class='text-danger'>{{$errors->first('user_image')}}</div>
	</div>
	<button type='submit' class='btn btn-primary'>Upload Image:</button>
</form>

@include  ('layouts.footer')