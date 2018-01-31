@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('students.index') }}">Alumnos</a>
  </li>
  <li class="breadcrumb-item active">Crear Alumno</li>
</ol>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user-plus" aria-hidden="true"></i> Crear alumno
  </div>
  <div class="card-block">
  @include('students._form')
  </div>
</div>
@endsection