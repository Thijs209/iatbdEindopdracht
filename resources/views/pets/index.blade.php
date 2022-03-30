@extends('default')
@section('title')
    Pets
@endsection

@section('content')
    <ul id="petCardGrid" class="petCardGrid">
        @foreach ($pets as $pet)
        <li class="petCard">
            <a href="/pets/{{$pet->id}}">
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
    <aside id="sidebar" class="sidebar">
        <button id="sidebarButton">open/close</button>
    </aside>
@endsection
