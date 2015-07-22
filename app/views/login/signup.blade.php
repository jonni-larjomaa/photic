@extends('layouts.master')

@section('content')
<div class="container login">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Register</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'signup', 'method' => 'post', 'role' => 'form')) }}
                    <fieldset>                    
                        <div class="form-group">
                            {{ $errors->first('email','<div>:message</div>') }}
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ $errors->first('username','<div>:message</div>') }}
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ $errors->first('password','<div>:message</div>') }}
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                {{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'password')) }}
                            </div>
                        </div>
                        {{ Form::submit('Register', array('class' => 'btn btn-block btn-default')) }}
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop