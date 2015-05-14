@extends('layouts.master')

@section('content')
<div class="container content">
    <div class="row">
        <h1>Kuvat</h1>
        <hr class="featurette-divider" id="albums">
        @foreach ($images as $image)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="{{ asset('gallery/photo/'.$image) }}">
                    <img class="gallery img-responsive" src="{{ asset($image.'/300/300') }}" alt="kuvia">
                </a>
            </div>
        @endforeach
    </div>
</div>
@stop

