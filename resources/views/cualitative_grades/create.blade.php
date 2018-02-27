@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('cualitative_grades.index') }}">Opciones a calificar</a>
  </li>
  <li class="breadcrumb-item active">Crear Opción</li>
</ol>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user-plus" aria-hidden="true"></i> Crear opción
  </div>
  <div class="card-block">
  @include('cualitative_grades._form')
  </div>
</div>
@endsection