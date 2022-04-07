@extends('components.header')
@section('title')
    Upload Foto`s
@endsection

@section('content')
<form class="create__images-art" action="/petprofile/uploadimages/{{$pet->petId}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2>Foto`s</h2>
    <div class="sep-bar"></div>
    <input class="create__submit-img" type="file" multiple name="images[]" accept=".jpg .png .jpeg" id="images">
    <input type="submit" name="submit" id="submit" value="upload">
    <section class="create__images">
        <figure>
            <img src="/img/icons/placeholder-image.png" alt="">
        </figure>
    </section>    
</form>
@endsection