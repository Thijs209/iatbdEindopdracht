@extends('components.header')
@section('title')
    Schrijf Review
@endsection

@section('content')
    <form class="create" action="/review/post/{{$id}}" method="POST">
        @csrf
        <h1>Schrijf een review</h1>
        <div class="sep-bar"></div>
        <textarea class="review__text" name="review" id="review" cols="30" rows="10"></textarea>
        <input class="auth__button center" type="submit" name="submit" id="submit" value="Plaats Review">
    </form>
@endsection