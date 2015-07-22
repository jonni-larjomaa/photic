@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template text-center">
                <h1>Oops!</h1>
                <h2>403 access denied</h2>
                <div class="error-details">
                    Sorry, an error has occured, You are unauthorized to access requested resource.
                </div>
            </div>
        </div>
    </div>
</div>
@stop
