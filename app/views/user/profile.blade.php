@extends('layouts.master')

@section('content')
<div class="container login">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Profile <small>{{$user->username}}</small></h3>
                </div>
                <div class="panel-body">
                    @if(Session::has('msg'))
                        <div class="alert alert-success">{{ Session::get('msg')}}</div>
                    @endif
                    {{ Form::model($user, array('route' => array('profile.update', $user->id))) }}
                    <fieldset>                    
                        <div class="form-group">
                            {{ $errors->first('email','<div class="alert alert-danger">:message</div>') }}
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ $errors->first('password','<div class="alert alert-danger">:message</div>') }}
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                {{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'password')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                {{ Form::password('password_confirmation',array('class' => 'form-control', 'placeholder' => 'confirmation')) }}
                            </div>
                        </div>
                        {{ Form::submit('Update', array('class' => 'btn btn-block btn-default')) }}
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
