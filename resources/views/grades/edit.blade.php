@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('levels.index') }}">Niveles</a>
  </li>
  <li class="breadcrumb-item active">Editar Nivel</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user" aria-hidden="true"></i></i> Editar nivel
  </div>
  <div class="card-block">
  @include('levels._form')
  </div>
</div>
@endsection