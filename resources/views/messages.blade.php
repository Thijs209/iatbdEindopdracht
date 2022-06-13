@extends('components.header')
@section('title')
    Berichten
@endsection

@section('content')
    <article class="messages">
        <section class="messages__title">
            <h1>Berichten</h1>
        </section>
        <section class="messages__list">
            @forelse ($messages as $message)
            <section class="messages__message">
                <a class="messages__sender" href="/profile/{{$message->sitterId}}"><h3>{{$message->sitterName}}</h3></a>
                <p>{{$message->message}}</p>
                @if ($message->accepted == 1)
                <a class="messages__button accepted">Geacepteerd</a>
                @else
                <a href="/messages/accept/{{$message->id}}" class="messages__button">Accepteer</a>
                @endif
            </section>
            @empty
            <p class="center-text">U heeft nog geen berichten.</p>
            @endforelse
        </section>
    </article>
@endsection