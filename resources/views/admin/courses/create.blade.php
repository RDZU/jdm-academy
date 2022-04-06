@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.courses.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.courses.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body" id="app">
            @if (Auth::user()->isAdmin())
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('teachers', 'Teachers', ['class' => 'control-label']) !!}
                    {!! Form::select('teachers[]', $teachers, old('teachers'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('teachers'))
                        <p class="help-block">
                            {{ $errors->first('teachers') }}
                        </p>
                    @endif
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','v-model'=>'url']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => '','readonly','v-model'=>"url.split(' ').join('-')"]) !!}
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
                    {!! Form::label('full_text', 'Full text', ['class' => 'control-label']) !!}
                    {!! Form::textarea('full_text', old('full_text'), ['class' => 'form-control editor ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('full_text'))
                        <p class="help-block">
                            {{ $errors->first('full_text') }}
                        </p>
                    @endif
                </div>
            </div>

             <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('requirement', 'Requirement', ['class' => 'control-label']) !!}
                    {!! Form::textarea('requirement', old('requirement'), ['class' => 'form-control editor ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('requirement'))
                        <p class="help-block">
                            {{ $errors->first('requirement') }}
                        </p>
                    @endif
                </div>
            </div>
@if(\Auth::user()->isAdmin())
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>

@endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('level', 'Level', ['class' => 'control-label']) !!}
                    {!! Form::text('level', old('level'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('level'))
                        <p class="help-block">
                            {{ $errors->first('level') }}
                        </p>
                    @endif
                </div>
            </div>

             <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
                    {!! Form::text('subject', old('subject'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subject'))
                        <p class="help-block">
                            {{ $errors->first('subject') }}
                        </p>
                    @endif
                </div>
            </div>
    <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('idiom', 'Idiom', ['class' => 'control-label']) !!}
                    {!! Form::text('idiom', old('idiom'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('idiom'))
                        <p class="help-block">
                            {{ $errors->first('idiom') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course_image', 'Course image', ['class' => 'control-label']) !!}
                    {!! Form::file('course_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('course_image_max_size', 8) !!}
                    {!! Form::hidden('course_image_max_width', 4000) !!}
                    {!! Form::hidden('course_image_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('course_image'))
                        <p class="help-block">
                            {{ $errors->first('course_image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_date', 'Start date', ['class' => 'control-label']) !!}
                    {!! Form::text('start_date', old('start_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_date'))
                        <p class="help-block">
                            {{ $errors->first('start_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('published', 'Published', ['class' => 'control-label']) !!}
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, false, []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('published'))
                        <p class="help-block">
                            {{ $errors->first('published') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
 <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>
    
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>
    <script type="text/javascript"> 
var app =new Vue({
el:'#app',
data:{
    url:''
}
})
</script>

@stop