@extends('layouts.noauth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username_email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input placeholder="Usuario" id="username_email" type="text" class="form-control" name="username_email" value="{{ old('username_email') }}">

                                @if ($errors->has('username_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
