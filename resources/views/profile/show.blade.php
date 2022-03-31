@extends('default')
@section('title')
    {{$user->name}}
@endsection

@section('content')
<article class="profile">
    <section class="profile__images">
        @foreach ($images as $image)
            <figure class="profile__figure">
                <img class="profile__image" src="{{$image->image}}">
                <button class="profile__button-left" id="left">left</button>
                <button class="profile__button-right" id="right">right</button>
            </figure>
        @endforeach

            <section class="profile__images-column">
                @foreach ($images as $image)
                    <figure class="profile__column-figure">
                        <img class="profile__column-image" src={{$image->image}}>
                    </figure>
                @endforeach
            </section>
        
    </section>
    <section class="profile__info">
        <h1 class="profile__title">{{$user->name}}</h1>
        <div class="sep-bar"></div>
        <p class="profile__description">{{$user->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex temporibus eveniet ducimus, suscipit dignissimos dolorum sapiente debitis nobis quisquam repudiandae ad? Culpa nihil officia eos quos voluptate neque, consectetur cumque.</p>
    </section>
</article>
@endsection

