@extends('components.header')
@section('title')
    Home
@endsection

@section('content')
    <article class="homepage__content">
        <section class="homepage__banner">
            <figure class="homepage__pet-figure">
                <img class="homepage__pet-image" src="/img/banners/pets-banner.jpg" alt="pet banners">                
            </figure>
            <h1 class="homepage__banner-title">Passen Op Je Dier</h1>
        </section>
    </article>
    <section class="homepage__animals">
        <h2 class="homepage__animals-title"><a href="/pets">Zoek Dieren</a></h2>
        {{-- <ul class="homepage__animal-list">
            @foreach ($animals as $animal)
                <li class="homepage__animal"><a href="/pets/{{$animal->animal}}">{{$animal->animal}}</a></li>
            @endforeach
        </ul> --}}
    </section>
    <section class="homepage__main">
        <article class="homepage__upload-pet">
            <h1 class="homepage__title">Zoek iemand om op je huisdier te passen</h1>
            <p class="homepage__text">Upload wat foto`s en informatie over je huisdier en vind in no time een oppas.</p>
            <button class="homepage__button upload-button" onclick="window.location='/petprofile'">Zoek een oppasser</button>
        </article>
        <article class="homepage__create-account">
            <h1 class="homepage__title">Word een dieren Op Passer</h1>
            <p class="homepage__text">Laat wat foto`s van jou of je huis zien, vertel wat over jezelf en verdien een extra zakcentje door gewoon op wat dieren te passen.</p>
            <button class="homepage__button" onclick="window.location='/account'">Wordt een oppasser</button>
        </article>
    </section>
@endsection