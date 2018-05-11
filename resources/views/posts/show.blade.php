@extends('layouts/app')

@section('content')
<a href="/posts" class="btn  btn-default">Go Back</a>
<h3>{{$post->title}}</h3>
<div>
{!!$post->body!!}

</div>

<hr>
<small>Written on {{$post->created_at}}</small>
<hr>
<small>Written by User id = {{$post->user_id}}</small>
<h1>{{$isSet}}</h1>
<hr>

@if($isSet == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endsection
