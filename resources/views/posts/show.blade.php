@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset(css/gallery_css/baugete-box.css)}}" />
<link rel="stylesheet" href="{{asset(css/gallery_css/cards-gallery.css)}}">
@endsection
@section('content')
<a href="/posts" class="btn  btn-default">Go Back</a>
<h3>{{$post->title}}</h3>
<div>
{!!$post->body!!}

</div>

<hr>
<small>Written on {{$post->created_at}}</small>

@if($post->user_id == $isSet)
<hr>
<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endif

@endsection
