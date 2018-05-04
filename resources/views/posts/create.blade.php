@extends('layouts/app')

@section('content')

<h3>Create post</h3>
{!! Form::open(['action'=>'PostsController@store','method'=>'POST']) !!}
    <div class="form-group">
    {{Form::label('title,'Title')}}
    {{Form::text('title','',['class'=>'from-control','placeholder'='Title'])}}
    </div>
{!! Form::close() !!}
@endsection
