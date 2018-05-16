@extends('layouts/app')
@section('content')
<a href="/posts" class="btn  btn-primary">Go Back</a>
<h3>{{$post->title}}</h3>
<img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}">
<div>
{!!$post->body!!}

</div>

<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>

@if($post->user_id == $isSet)
<hr>
<a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
{!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endif

@endsection
