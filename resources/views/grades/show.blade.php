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

<div class="card">
  <div class="card-header">
    <h1>Observaciones</h1>
  </div>
  <div class="card-body">
    <p>
      @foreach ($student->enrolled as $group)
        @foreach($group->semester->partials->sortBy('order') as $partial)
          {{ !empty($student->grades)
          && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first())
          && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->comments)
          ? $group->subject->name . ', ' . $partial->name . ': ' . $student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->comments
          : null }}
        @endforeach
      @endforeach
    </p>
  </div>
</div>
@endsection