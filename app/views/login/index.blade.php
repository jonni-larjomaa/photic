@extends('layouts.master')

@section('content')
<div class="container login">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading-inverse">
                    <h3 class="panel-title">Tunnussana!</h3>
                </div>
                <div class="panel-body">
                    @if($error)
                    <p> Jotain meni vikaan! </p>
                    @endif
                    <form accept-charset="UTF-8" method="post" action="" role="form">
                    <fieldset>
                        <div class="form-group">
                                <input class="form-control" placeholder="Tunnussana" name="password" type="password" value="">
                        </div>
                        <input class="form-control" name="username" type="hidden" value="haat">
                        <input class="btn btn-lg btn-block btn-login" type="submit" value="Kirjaudu">
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
