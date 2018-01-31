@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('subjects.index') }}">Materias</a>
  </li>
  <li class="breadcrumb-item active">Crear Materia</li>
</ol>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user-plus" aria-hidden="true"></i> Crear materia
  </div>
  <div class="card-block">
  @include('subjects._form')
  </div>
</div>
@endsection