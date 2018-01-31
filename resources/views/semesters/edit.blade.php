@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('semesters.index') }}">Semestres</a>
  </li>
  <li class="breadcrumb-item active">Editar Semestre</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user" aria-hidden="true"></i></i> Editar semestre
  </div>
  <div class="card-block">
  @include('semesters._form')
  </div>
</div>
@endsection