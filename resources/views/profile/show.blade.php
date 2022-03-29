@extends('default')
@section('title')
    {{$user->name}}
@endsection

@section('content')
    <h1>{{$user->name}}</h1>
    <img src="{{$user->image}}">
    <p>{{$user->description}}</p>  
@endsection

