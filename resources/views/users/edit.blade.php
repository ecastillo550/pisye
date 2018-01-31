@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header m-t-15">
        <div class="card-title">
          Mark fields <span class="text-danger">*</span> are required.
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
   			{!! Form::model($user, ['route' => ['users.update', $user->id], 'files' => true]) !!}
      		{{ method_field('PUT') }}
          @include('users.partials._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
