@extends('components.header')
@section('title')
    {{$pet->petName}}
@endsection

@section('content')
    <section class="pet">
        <article class="pet__images">
            <section class="pet__images-column">
                @foreach ($images as $image)
                    <figure class="pet__column-figure">
                        <img class="pet__column-image column-images" src='{{$image->image}}'>
                    </figure>
                @endforeach
            </section>
            <section class="pet__big-images">
                <button class="pet__button-left" id="left"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512.006 512.006" style="enable-background:new 0 0 512.006 512.006;" xml:space="preserve"><g><g><path d="M388.419,475.59L168.834,256.005L388.418,36.421c8.341-8.341,8.341-21.824,0-30.165s-21.824-8.341-30.165,0    L123.586,240.923c-8.341,8.341-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251    c5.461,0,10.923-2.091,15.083-6.251C396.76,497.414,396.76,483.931,388.419,475.59z"/></g></g></svg></button>
                <button class="pet__button-right" id="right"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                    <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001  c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213  C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606  C255,161.018,253.42,157.202,250.606,154.389z"/></svg></button>
                @foreach ($images as $image)
                    <figure class="pet__figure imagelist">
                        <img class="pet__image" src="{{$image->image}}">
                    </figure>
                @endforeach
            </section>        
        </article>
        <article class="pet__info">
            <h1 class="pet__info-title">{{$pet->petName}}</h1>
            <div class="sep-bar"></div>
            <ul class="pet__info-list">
                <li class="pet__info-item">{{$pet->petType}}</li>
                <li class="pet__info-item">Eigenaar: {{$pet->ownerName}}</li>
                @if (is_null($pet->breed))
                    
                @else
                    <li class="pet__info-item">Ras: {{$pet->breed}}</li>
                @endif
                <li class="pet__info-item">{{$pet->startDate}} - {{$pet->endDate}}</li>
                <li class="pet__info-item">Betaling: €{{$pet->payment}}/uur</li>
            </ul>
            @if (is_null($pet->important))
                
            @else
            <article class="pet__info-important">
                <h1 class="pet__info-title">Belangrijke punten</h1>
                <div class="sep-bar"></div>
                <p class="pet__important">{{$pet->important}}</p>
            </article>
            @endif
            <article class="pet__info-description">
                <h1 class="pet__info-title">Beschrijving</h1>
                <div class="sep-bar"></div>
                <p class="pet__description">{{$pet->description}}</p>
            </article>
        </article>
        <section class="wide">
            <button id="respond" class="auth__button center">Reageer!</button>
        </section>
        <div id="overlay" class="overlay"></div>
        <form action="/pets/respond/{{$pet->petId}}" method="POST" id="confirm" class="confirm">
            @csrf
            <h1>Stuur een berichtje naar {{$pet->ownerName}}!</h1>
            <textarea class="confirm__message center" name="message"></textarea>
            <section class="confirm__buttons">
                <input id="yes" class="confirm__button" value="Stuur" type="submit">
                <a href="/pets/show/{{$pet->petId}}" id="no" class="confirm__button confirm__no">Annuleer</a>
            </section>
        </form>
        @if ($sent == "true")    
        <section class="create__saved" id="saved">
            <h1>Reactie Verstuurd!</h1>
            <button class="close-button create__close-button" id="dismiss"><?xml version="1.0"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/></svg></button>
        </section>
        @endif
    </section>
@endsection
