@extends('layouts.app')
@section('dzava')
<script>function myFunction(){document.getElementById("demo").innerHTML = "Hello world";}</script>
@endsection
@section('content')
<h1>This is about page</h1>
<button type="button" class="btn btn-primary" onclick="myFunction()" >Primary</button>

<h1>{{$light}}</h1>
<h1 id="demo"></h1>
@endsection
