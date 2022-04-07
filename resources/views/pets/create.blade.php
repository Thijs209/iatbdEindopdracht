@extends('components.header')
@section('title')
    Huisdier Profiel
@endsection

@section('content')
    <form action="/pets" method="POST" class="create" enctype="multipart/form-data">
        @csrf
        <article>
            <h2>Huisdier Informatie</h2>
            <div class="sep-bar"></div>
            <section class="create__form">
                <section class="create__input">
                    <label for="petName">Naam</label>
                    <input required class="create__input-text" type="text" name="petName" id="petName">
                </section>
                <section class="create__input">
                    <label for="petType">Soort</label>
                    <select class="create__input-text" name="petType" id="petType" required="required">
                        @foreach ($animals as $animal)
                        <option value="{{$animal->animal}}">{{$animal->animal}}</option>
                        @endforeach
                    </select>
                </section>
                <section class="create__input">
                    <label for="breed">Ras</label>
                    <input class="create__input-text" type="text" name="breed" id="breed">
                </section>
                <section class="create__input">
                    <label for="payment">Betaling</label>
                    <input required class="create__input-text" type="number" name="payment" id="payment">
                </section>
                <section class="create__input">
                    <label for="startdate">Van</label>
                    <input required class="create__input-text" type="date" name="startdate" id="startdate">
                </section>
                <section class="create__input">
                    <label for="enddate">Tot</label>
                    <input required class="create__input-text" type="date" name="enddate" id="enddate">
                </section>
                <section class="create__input big-input-sect">
                    <label for="important">Belangrijke punten</label>
                    <textarea class="create__input-text create__big-input" type="text" name="important" id="important"></textarea>
                </section>
                <section class="create__input big-input-sect">
                    <label for="description">Beschrijving</label>
                    <textarea class="create__input-text create__big-input" type="text" name="description" id="description"></textarea>
                </section>
            </section>
        </article>
        <input class="create__submit" type="submit" name="submit" id="submit" value="Opslaan">
    </form>
@endsection