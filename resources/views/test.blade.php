@extends('layouts.home')

@section('content')
<h1>Bienvenid@s a la aplicación Laravel</h1>
<hr />
@if (Session::has('status'))
    <div class="bg-success" style="padding: 20px;">
        {{Session::get('status')}}
    </div>
    <hr />
@endif
@if (Auth::check())
    <form method="post" action="{{url('user/createcomment')}}">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-1">
                    <img src="{{url(Auth::user()->perfiles)}}" class='img-responsive' style='max-width: 60px' />
                    <strong>{{Auth::user()->name}}</strong>
                </div>
                <div class="col-md-6">
                    <textarea name="comment" class="form-control"></textarea>
                    <br />
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
            </div>
        </div>
    </form>
    <hr />
        <?php 
        $comments = App\Comments::select()->orderBy('id', 'desc')->get();
        foreach($comments as $comment):
            $user = App\User::select()->where('id', '=', $comment->id_user)->first();
        ?>
        <div class="row">
            <div class="col-md-1">
                <img src='{{url($user->perfiles)}}' class='img-responsive' style='max-width: 60px' />
                <strong>{{$user->name}}</strong>
            </div>
            <div class='col-md-6'>
               {{$comment->comment}} 
               <br />
               <i>Fecha: {{$comment->date}} · Hora: {{$comment->time}}</i>
            </div>
        </div>
        <hr />
        <?php endforeach ?>
@else
    <hr />
    <p class="bg-info" style="padding: 20px;">Para poder publicar comentarios tienes que <a href="{{url('auth/login')}}">iniciar sesión</a></div>
    <hr />
@endif
@stop














<?php 
        $comments = App\Comments::select()->orderBy('id', 'desc')->get();
        foreach($comments as $comment):
            $user = App\User::select()->where('id', '=', $comment->id_user)->first();
        ?>
        <div class="row">
            <div class="col-md-1">
                <img src='{{url($user->perfiles)}}' class='img-responsive' style='max-width: 60px' />
                <strong>{{$user->name}}</strong>
            </div>
            <div class='col-md-6'>
               {{$comment->comment}} 
               <br />
               <i>Fecha: {{$comment->date}} · Hora: {{$comment->time}}</i>
            </div>
        </div>
        <hr />
        <?php endforeach ?>
@else
    <hr />
    <p class="bg-info" style="padding: 20px;">Para poder publicar comentarios tienes que <a href="{{url('auth/login')}}">iniciar sesión</a></div>
    <hr />