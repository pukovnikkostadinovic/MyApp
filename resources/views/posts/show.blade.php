@extends('layouts/app')

@section('content')
<a href="/posts" class="btn  btn-default">Go Back</a>
<h3>{{$postBody->title}}</h3>
<div>
{{$postBody->body}}

</div>

<hr>
<small>Written on {{$postBody->created_at}}</small>
@endsection
