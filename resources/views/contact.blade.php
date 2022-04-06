@include('layouts.header')

<section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/contact.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>{{trans('global.contact.title3')}}</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    <section class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="{{route('message')}}" method="post">
            	{{csrf_field()}}
                  <div class="row">
                    <div class="col-md-4 form-group" {{$errors->has('name') ? 'has-error' : ''}}>
                      <label for="name">{{trans('global.contact.fields.name')}}</label>
                      <input type="text" id="name" name="name" class="form-control " placeholder="{{trans('global.contact.fields.name')}}" value= "{{old('name')}}">
                       @if($errors->has('name'))

<span class="help-block">
  <strong class="red-message">{{$errors->first('name')}}</strong>
</span>
      @endif
                    </div>
                    <div class="col-md-4 form-group"  {{$errors->has('lastname') ? 'has-error' : ''}}>
                        <label for="name">{{trans('global.contact.fields.last-name')}}</label>
                        <input type="text" id="lastname" name="lastname" class="form-control " placeholder="{{trans('global.contact.fields.last-name')}}" value= "{{old('lastname')}}">
                        @if($errors->has('lastname'))

<span class="help-block">
  <strong class="red-message">{{$errors->first('lastname')}}</strong>
</span>
      @endif
                      </div>
                    
                    <div class="col-md-4 form-group"  {{$errors->has('email') ? 'has-error' : ''}}>
                      <label for="email">{{trans('global.contact.fields.email')}}</label>
                      <input type="email" id="email" name="email" class="form-control " placeholder="{{trans('global.contact.fields.email')}}" value= "{{old('email')}}">
                      @if($errors->has('email'))

<span class="help-block">
  <strong class="red-message">{{$errors->first('email')}}</strong>
</span>
      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group" {{$errors->has('message') ? 'has-error' : ''}} >
                      <label for="message">{{trans('global.contact.fields.message')}}</label>
                      <textarea name="message" id="message" name="message" class="form-control " cols="30" rows="8" placeholder="{{trans('global.contact.fields.message')}}" value= "{{old('message')}}"></textarea>
                      @if($errors->has('email'))

<span class="help-block">
  <strong class="red-message">{{$errors->first('message')}}</strong>
</span>
      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="{{trans('global.contact.button')}}" class="btn btn-info">
                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


@include('layouts.footer')