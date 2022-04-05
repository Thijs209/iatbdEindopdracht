@extends('components.header')
@section('title')
    {{$user->name}}
@endsection

@section('content')
<article class="profile">
    <section class="profile__images">
        <section class="profile__images-column">
            @foreach ($images as $image)
                <figure class="profile__column-figure">
                    <img class="profile__column-image column-images" src={{$image->image}}>
                </figure>
            @endforeach
        </section>
        <section class="profile__big-images">
            <button class="profile__button-left" id="left"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512.006 512.006" style="enable-background:new 0 0 512.006 512.006;" xml:space="preserve"><g><g><path d="M388.419,475.59L168.834,256.005L388.418,36.421c8.341-8.341,8.341-21.824,0-30.165s-21.824-8.341-30.165,0    L123.586,240.923c-8.341,8.341-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251    c5.461,0,10.923-2.091,15.083-6.251C396.76,497.414,396.76,483.931,388.419,475.59z"/></g></g></svg></button>
            <button class="profile__button-right" id="right"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001  c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213  C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606  C255,161.018,253.42,157.202,250.606,154.389z"/></svg></button>
            @foreach ($images as $image)
                <figure class="profile__figure imagelist">
                    <img class="profile__image" src="{{$image->image}}">
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

