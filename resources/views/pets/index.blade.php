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
                    <p>€</p>
                    <input class="sidebar__text-input" type="number" name="payment" id="payment">
                    <p>/uur</p>
                </section>
            </article>
            <article class="sidebar__animal-filters">
                <h2 class="sidebar__title">Dierensoort</h2>
                <section class="sidebar__filters-list">
                    <div class="sep-bar"></div>
                    <section class="sidebar__list">
                        @foreach ($animals as $animal)
                        <section>
                            <input id="{{$animal->animal}}" checked type="checkbox" class="sidebar__filter animal-filter">
                            <label class="sidebar__filter-label" for="{{$animal->animal}}">{{$animal->animal}}</label>
                        </section>
                        @endforeach
                    </section>
                </section>
            </article>
        </section>
        <button id="closeSidebar" class="close-button"><?xml version="1.0"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/></svg></button>
    </aside>
    <button class="auth__button filter__button" id="filters">Filters</button>
    <ul id="petCardGrid" class="petCardGrid">
        @foreach ($pets as $pet)
        <li class="petCard" data-animal="{{$pet->petType}}" data-payment="{{$pet->payment}}">
            <a href="/pets/show/{{$pet->petId}}">
                <figure class="petCard__imageSection">
                    <img class="petCard__image" src="{{$pet->image}}">
                </figure>

                <div class="sep-bar"></div>

                <section class="petCard__textSection">
                    <h1 class="petCard__title">{{$pet->petName}}</h1>
                    {{-- <p class="petCard__Description">{{$pet->description}}</p> --}}
                    <ul class="petCard__attributes">
                        <li>{{$pet->petType}}</li>
                        <li>€{{$pet->payment}}/uur</li>
                        <li>{{$pet->startDate}} - {{$pet->endDate}}</li>
                    </ul>
                </section>
            </a>
        </li>
        @endforeach
    </ul>
</section>
@endsection
