@extends('components.header')
@section('title')
    Home
@endsection

@section('content')
    <article class="homepage__content">
        <section class="homepage__slideshow">
            @foreach ($pets as $pet)
            <figure class="homepage__pet-figure">
                <img class="homepage__pet-image" src="{{$pet->image}}" alt="">                
            </figure>
            @endforeach
        </section>
    </article>
@endsection