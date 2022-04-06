@include('layouts.header')


<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('images/teacher-unsplash.jpg')}}');">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{Auth::user()->name}} </h1>
            </div>
          </div>
        </div>
      </div>
    </section>


 <section class="site-section bg-light">
<div class="container">
   <div class="col-md-12 text-center">
            <h2>{{trans('user.profile.edit-profile')}}</h2>
           
          </div>
      <hr />
    <div class="text-center">
        <img class="rounded" style='max-width:300px'  src="{{url(Auth::user()->user_image)}}"  alt="">


<ul>
  <br>
    <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#image" type="button"><i class="fa fa-sign-in" aria-hidden="true"> {{trans('user.profile.changed-image')}}</i></button>
</ul>
    </div>
    <hr>
  
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['edit_profile']]) !!}
     
   
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">{{trans('user.profile.full-name')}}</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('user.profile.full-name')}}" value="{{Auth::user()->name}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">{{trans('user.profile.headline')}}</label>
      <input type="text" class="form-control" id="specialized" name="specialized" placeholder="{{trans('user.profile.headline')}}" value="{{Auth::user()->specialized}}">
    </div>
  </div>
 
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">{{trans('user.profile.country')}}</label>
      <select name="country" id="country" class="form-control select">
        @foreach ($countries as $key => $value)
            <option value="{{ $key }}"
            @if ($key == old('country', $user->country_id))
                selected="selected"
            @endif
            >{{ $value }}</option>
        @endforeach
        </select>
    </div>
    
    

    <div class="form-group col-md-6">
      <label for="inputCity">{{trans('user.profile.city')}}</label>
    <input type="text" class="form-control" id="city" name="city" value="{{Auth::user()->city}}" placeholder="{{trans('user.profile.city')}}">
    </div>

  </div>

  <button type="submit" class="btn btn-info">{{trans('user.profile.update')}}</button>

{!! Form::close() !!}

 
     </div>
    </section>



    <div class="modal fade" tabindex="-1" role="dialog" id="image">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                  </button>
            
            </div>
          
      
             
          
            
<h4>{{trans('user.profile.add-image')}}</h4>
<form method='post' action='{{asset("updateprofile")}}' enctype='multipart/form-data'>
	{{csrf_field()}}
	<div class='form-group'>
		<label for='user_image'>{{trans('user.profile.image')}} </label>
		<input type="file" name="user_image"/>
		<div class='text-danger'>{{$errors->first('user_image')}}</div>
	</div>
  <button type='submit' class='btn btn-primary btn-sm'>{{trans('user.profile.upload-image')}}</button>
  <br>
</form>
      
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->





      
@include('layouts.footer')

