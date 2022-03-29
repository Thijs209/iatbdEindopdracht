@extends('default')
@section('title')
    {{$pet->petName}}
@endsection

@section('content')
    <h1>{{$pet->petName}}</h1>
    <img src={{$pet->image}}>
    <p>{{$pet->petName}} is een {{$pet->petType}}</p>
    <p>{{$pet->petName}} is van {{$pet->ownerName}}</p>
    <p>{{$pet->description}}</p>
@endsection
