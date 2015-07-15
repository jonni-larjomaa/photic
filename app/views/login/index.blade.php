@extends('layouts.master')

@section('content')
<div class="container login">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading-inverse">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <!-- if there are login errors, show them here -->
                    @if(Session::has('fail'))
                    <p class="errors">
                        {{ Session::get('fail') }}
                    </p>
                    @endif
                    {{ Form::open(array('url' => 'login', 'method' => 'post', 'role' => 'form')) }}
                    <fieldset>                    
                        <div class="form-group">
                            {{ Form::label('username', 'Username') }}
                            {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'password')) }}
                        </div>
                        {{ Form::submit('Login', array('class' => 'btn btn-lg btn-block btn-login')) }}
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
