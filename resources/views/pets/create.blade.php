@extends('components.header')
@section('title')
    Huisdier Profiel
@endsection

@section('content')
    <form action="/pets/create/{{$id}}" method="POST" class="create" enctype="multipart/form-data">
        @csrf
        <article>
            <h2>Huisdier Informatie</h2>
            <div class="sep-bar"></div>
            <section class="create__form">
                <section class="create__input">
                    <label for="petName">Naam</label>
                    <input required class="create__input-text" type="text" name="petName" id="petName" 
                    @if (!empty($pet))
                        value="{{$pet->petName}}"
                    @endif
                    >
                </section>
                <section class="create__input">
                    <label for="petType">Soort</label>
                    <select class="create__input-text" name="petType" id="petType" required="required"
                    @if (!empty($pet))
                        value="{{$pet->petType}}">
                    @endif
                        @foreach ($animals as $animal)
                        <option value="{{$animal->animal}}">{{$animal->animal}}</option>
                        @endforeach
                    </select>
                </section>
                <section class="create__input">
                    <label for="breed">Ras</label>
                    <input class="create__input-text" type="text" name="breed" id="breed" 
                    @if (!empty($pet))
                        value="{{$pet->breed}}"
                    @endif>
                </section>
                <section class="create__input">
                    <label for="payment">Betaling in €/uur</label>
                    <input required class="create__input-text" type="number" name="payment" id="payment"
                    @if (!empty($pet))
                        value="{{$pet->payment}}"
                    @endif>
                </section>
                <section class="create__input">
                    <label for="startdate">Van</label>
                    <input required class="create__input-text" type="date" name="startdate" id="startdate"
                    @if (!empty($pet))
                        value="{{$pet->startDate}}"
                    @endif>
                </section>
                <section class="create__input">
                    <label for="enddate">Tot</label>
                    <input required class="create__input-text" type="date" name="enddate" id="enddate"
                    @if (!empty($pet))
                        value="{{$pet->endDate}}"
                    @endif>
                </section>
                <section class="create__input big-input-sect">
                    <label for="important">Belangrijke punten</label>
                    <textarea class="create__input-text create__big-input" type="text" name="important" id="important">@if (!empty($pet)){{$pet->important}}@endif</textarea>
                </section>
                <section class="create__input big-input-sect">
                    <label for="description">Beschrijving</label>
                    <textarea class="create__input-text create__big-input" type="text" name="description" id="description">@if (!empty($pet)){{$pet->description}}@endif</textarea>
                </section>
            </section>
        </article>
        <input class="create__submit" type="submit" name="submit" id="submit" value="Volgende">
        <a href="/" class="close-button"><?xml version="1.0"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/></svg></section>
    </form>
@endsection