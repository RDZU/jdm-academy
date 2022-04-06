@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body" id="app">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','v-model'=>'url']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>


                <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => '','readonly','v-model'=>"url.split(' ').join('_')"]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>

   <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_image', 'User image', ['class' => 'control-label']) !!}
                    {!! Form::file('user_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('user_image_max_size', 8) !!}
                    {!! Form::hidden('user_image_max_width', 4000) !!}
                    {!! Form::hidden('user_image_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_image'))
                        <p class="help-block">
                            {{ $errors->first('user_image') }}
                        </p>
                    @endif
                </div>
            </div>



            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>

              <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>

           
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role[]', $roles, old('role') ? old('role') : $user->role->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role'))
                        <p class="help-block">
                            {{ $errors->first('role') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Twitter', 'twitter', ['class' => 'control-label']) !!}
                    {!! Form::text('link_twitter', old('link_twitter'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('link_twitter'))
                        <p class="help-block">
                            {{ $errors->first('link_twitter') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Instagram', 'instagram', ['class' => 'control-label']) !!}
                    {!! Form::text('link_instagram', old('link_instagram'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('link_instagram'))
                        <p class="help-block">
                            {{ $errors->first('link_instagram') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Facebook', 'facebook', ['class' => 'control-label']) !!}
                    {!! Form::text('link_facebook', old('link_facebook'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('link_facebook'))
                        <p class="help-block">
                            {{ $errors->first('link_facebook') }}
                        </p>
                    @endif
                </div>
            </div>


        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    <script src="{{ url('adminlte/js/vue.min.js') }}"></script>
    <script type="text/javascript"> 
var app =new Vue({
el:'#app',
data:{
    url:''
}
})
</script>
@stop

