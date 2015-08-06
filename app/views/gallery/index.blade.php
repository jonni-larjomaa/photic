@extends('layouts.master')

@section('prepend-css')
<!-- Add fancyBox -->
<link rel="stylesheet" href="/lib/fancyboxjs/jquery.fancybox.css" type="text/css" media="screen" />
@stop

@section('prepend-js')
<script type="text/javascript" src="/lib/fancyboxjs/jquery.fancybox.pack.js"></script>
@stop

@section('content')
<div class="container">
    <div class="row">
        <h1>Latest Images</h1>
        <hr class="featurette-divider" id="albums">
        @foreach ($images as $image)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" rel="gallery1" href="{{ asset('gallery/photo/'.$image) }}">
                    <img class="gallery img-responsive" src="{{ asset($image.'/300/300') }}" alt="kuvia" />
                    
                    @if(Auth::check())
                    <button class="delete"><span class="glyphicon glyphicon-trash"></span></button>
                    @endif
                    
                </a>
                @include('gallery.exif', array('exif' => Gallery::getExifData($image) ))
            </div>
        @endforeach
    </div>
</div>
@stop

