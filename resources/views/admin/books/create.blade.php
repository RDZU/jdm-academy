@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.books.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.books.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body" id="app">
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
                    {!! Form::label('slug', trans('global.books.fields.slug').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('authors', trans('global.books.fields.authors').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('authors', old('authors'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('authors'))
                        <p class="help-block">
                            {{ $errors->first('authors') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('global.books.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('full_text', trans('global.books.fields.full-text').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('full_text', old('full_text'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('subject', trans('global.books.fields.subject').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('editorial', trans('global.books.fields.editorial').'', ['class' => 'control-label']) !!}
                    {!! Form::text('editorial', old('editorial'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('editorial'))
                        <p class="help-block">
                            {{ $errors->first('editorial') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('edition', trans('global.books.fields.edition').'', ['class' => 'control-label']) !!}
                    {!! Form::number('edition', old('edition'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('edition'))
                        <p class="help-block">
                            {{ $errors->first('edition') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('file', trans('global.books.fields.file').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('file', old('file')) !!}
                    {!! Form::file('file', ['class' => 'form-control', 'required' => '']) !!}
                    {!! Form::hidden('file_max_size', 20) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file'))
                        <p class="help-block">
                            {{ $errors->first('file') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('picture', trans('global.books.fields.picture').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('picture', old('picture')) !!}
                    {!! Form::file('picture', ['class' => 'form-control', 'required' => '']) !!}
                    {!! Form::hidden('file_max_size', 20) !!}
                    <p class="help-block"></p>
                    @if($errors->has('picture'))
                        <p class="help-block">
                            {{ $errors->first('picture') }}
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

    <script type="text/javascript"> 
var app =new Vue({
el:'#app',
data:{
    url:''
}
})
</script>

@stop