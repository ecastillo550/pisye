@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Calificaciones</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h1>{{ $student->name }}</h1>
  </div>
  <div class="card-body">
    <div class="row">
    @foreach ($student->enrolled as $group)
      <div class="col-6">
        @include('grades.partials.subject_table')
      </div>
    @endforeach
    </div>
  </div>
</div>
@endsection