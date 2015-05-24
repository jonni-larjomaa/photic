@extends('layouts.master')

@section('prepend-css')
    <link rel="stylesheet" href="css/dropzone.basic.css">
    <link rel="stylesheet" href="css/dropzone.css">
@stop

@section('content')
<div class="container">
    <form action="/upload" class="dropzone dz-clickable" id="my-awesome-dropzone">
        <div class="dz-message">Drop files here or click to upload (Max file size: {{ $upload_max_size }} MB)</div>
    </form>
</div>

<script src="js/dropzone.js"></script>
@stop