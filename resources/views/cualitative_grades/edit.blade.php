@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('subjects.index') }}">Opciónes</a>
  </li>
  <li class="breadcrumb-item active">Editar Opción</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user" aria-hidden="true"></i></i> Editar Opción
  </div>
  <div class="card-block">
  @include('cualitative_grades._form')
  </div>
</div>
@endsection