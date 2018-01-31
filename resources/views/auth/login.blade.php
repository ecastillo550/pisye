@extends('layouts.clean')

@section('content')
<div class="login-wrapper ">
  <!-- START Login Background Pic Wrapper-->
  <div class="bg-pic">
    <!-- START Background Pic-->
    <img src="/images/banner.jpg" data-src="/images/banner.jpg" data-src-retina="/images/banner.jpg" alt="" class="lazy">
    <!-- END Background Pic-->
    <!-- START Background Caption-->
    <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
      <h2 class="semi-bold text-white">
      Bienvenido</h2>
      <p class="small">
      </p>
    </div>
    <!-- END Background Caption-->
  </div>
  <!-- END Login Background Pic Wrapper-->
  <!-- START Login Right Container-->
  <div class="login-container bg-white">
    <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
      <h3>PISYE</h3>
      <p class="p-t-35">Ingresa a tu cuenta</p>
      <!-- START Login Form -->
      <form id="form-login" class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <!-- START Form Control-->
        <div class="form-group form-group-default{{ $errors->has('username') ? ' has-error' : '' }}">
          <label for="username">Usuario</label>
          <input class="form-control" type="text" aria-describedby="usernameHelp" placeholder="Enter username" name="username" value="{{ old('username') }}" required autofocus>
          @if ($errors->has('username'))
            <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
          @endif
        </div>
        <!-- END Form Control-->

        <!-- START Form Control-->
        <div class="form-group form-group-default">
          <label for="exampleInputPassword1">Contraseña</label>
          <input class="form-control" type="password" placeholder="Password" name="password">
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <!-- END Form Control-->
        <div class="row">
          <div class="col-md-6 no-padding sm-p-l-10">
            <div class="checkbox ">
              <input type="checkbox" value="1" id="checkbox1" {{ old('remember') ? 'checked' : '' }}>
              <label for="checkbox1">Recuérdame</label>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-end">
            <a href="#" class="text-info small">¿Necesitas ayuda?</a>
          </div>
        </div>
        <button class="btn btn-primary btn-cons m-t-10" type="submit">Entrar</button>
      </form>
      <!--END Login Form-->
      <div class="pull-bottom sm-pull-bottom">
        <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
          <div class="col-sm-9 no-padding m-t-10">
            <p>
              <small>
              </small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Login Right Container-->
</div>
@endsection



