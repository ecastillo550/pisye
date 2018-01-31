@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('groups.index') }}">Grupos</a>
  </li>
  <li class="breadcrumb-item active">Editar Grupo</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user" aria-hidden="true"></i></i> Editar grupo
  </div>
  <div class="card-block">
  @include('groups._form')
  </div>
</div>
@endsection