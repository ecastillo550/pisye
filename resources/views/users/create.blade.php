@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header m-t-15">
        <div class="card-title">
          Los campos marcados <span class="text-danger">*</span> son obligatorios.
        </div>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <button class="close" data-dismiss="alert"></button>
          <strong>Error!</strong><br>
          @foreach($errors->all() as $error)
              {{ $error }} <br>
            @endforeach
        </div>
        @endif
      </div>
      <div class="card-block">
        {!! Form::model($user, ['route' => 'users.store', 'files' => true]) !!}
          @include('users.partials._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection