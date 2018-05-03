@extends('layouts.app')
@section('content')
<h1>This is about page</h1>
<button type="button" class="btn btn-primary" onclick="<?php $light = 10 ?>" >Primary</button>
<h1>{{$light}}</h1>
@endsection