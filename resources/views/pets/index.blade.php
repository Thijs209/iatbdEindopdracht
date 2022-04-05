@extends('components.header')
@section('title')
    Pets
@endsection

@section('content')
<section class="main">
    <aside id="sidebar" class="sidebar">
        <section class="sidebar__header"><h1>Filters</h1></section>
        <button id="sidebarButton" class="sidebar__button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22"><defs><clipPath><path fill="#00f" fill-opacity=".514" d="m-7 1024.36h34v34h-34z"/></clipPath><clipPath><path fill="#aade87" fill-opacity=".472" d="m-6 1028.36h32v32h-32z"/></clipPath></defs><path d="m345.44 248.29l-194.29 194.28c-12.359 12.365-32.397 12.365-44.75 0-12.354-12.354-12.354-32.391 0-44.744l171.91-171.91-171.91-171.9c-12.354-12.359-12.354-32.394 0-44.748 12.354-12.359 32.391-12.359 44.75 0l194.29 194.28c6.177 6.18 9.262 14.271 9.262 22.366 0 8.099-3.091 16.196-9.267 22.373" transform="matrix(.03541-.00013.00013.03541 2.98 3.02)" fill="#4d4d4d"/></svg></button>
        <section class="sidebar__filters">
            <article class="sidebar__payment-filters">
                <h2 class="sidebar__title">Betaling</h2>
                <div class="sep-bar"></div>
                <section class="sidebar__text-input-section">
                    <input class="sidebar__text-input" type="number" name="payment" id="payment">
                </section>
            </article>
            <article class="sidebar__animal-filters">
                <h2 class="sidebar__title">Dierensoort</h2>
                <section class="sidebar__filters-list">
                    <div class="sep-bar"></div>
                    @foreach ($animals as $animal)
                    <section>
                        <input id="{{$animal->animal}}" checked type="checkbox" class="sidebar__filter animal-filter">
                        <label class="sidebar__filter-label" for="{{$animal->animal}}">{{$animal->animal}}</label>
                    </section>
                    @endforeach
                </section>
            </article>
        </section>
    </aside>
    <ul id="petCardGrid" class="petCardGrid">
        @foreach ($pets as $pet)
        <li class="petCard" data-animal="{{$pet->petType}}" data-payment="{{$pet->payment}}">
            <a href="/pets/show/{{$pet->id}}">
                <figure class="petCard__imageSection">
                    <img class="petCard__image" src="{{$pet->image}}">
                </figure>

                <div class="sep-bar"></div>

                <section class="petCard__textSection">
                    <h1 class="petCard__title">{{$pet->petName}}</h1>
                    {{-- <p class="petCard__Description">{{$pet->description}}</p> --}}
                    <ul class="petCard__attributes">
                        <li>{{$pet->petType}}</li>
                        <li>{{$pet->breed}}</li>
                        <li>{{$pet->startDate}} - {{$pet->endDate}}</li>
                    </ul>
                </section>
            </a>
        </li>
        @endforeach
    </ul>
</section>
@endsection
