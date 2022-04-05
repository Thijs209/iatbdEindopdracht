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
    <ul class="homepage__animal-list">
        @foreach ($animals as $animal)
            <li class="homepage__animal"><a href="/pets/{{$animal->animal}}">{{$animal->animal}}</a></li>
        @endforeach
    </ul>
    <section class="homepage__cards">
        <article class="homepage__card">
            <section class="homepage__heading">
                <h1 class="homepage__heading-title">Zoek huisdieren om op te passen</h1>
            </section>
            <div class="sep-bar"></div>
            <section class="homepage__card-content">
                <p class="homepage__card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At cum quis consequatur sed magnam error ducimus quo fugit minima? Distinctio nam error itaque autem delectus laudantium nulla laboriosam non accusantium.</p>
            </section>
            <section class="homepage__card-button-section">
                <button class="auth__button">Zoek Huisdieren</button>
            </section>
        </article>
        <article class="homepage__card">
            <section class="homepage__heading">
                <h1 class="homepage__heading-title">Zoek een oppasser voor jou huisdier</h1>
            </section>
            <div class="sep-bar"></div>
            <section class="homepage__card-content">
                <p class="homepage__card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At cum quis consequatur sed magnam error ducimus quo fugit minima? Distinctio nam error itaque autem delectus laudantium nulla laboriosam non accusantium.</p>
            </section>
            <section class="homepage__card-button-section">
                <button class="auth__button">Upload Huisdier</button>
            </section>
        </article>
    </section>
@endsection