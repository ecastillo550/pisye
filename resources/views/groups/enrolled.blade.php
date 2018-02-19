@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Grupos de: {{ $student->name }}</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <h1 class="page-header">Grupos de: {{ $student->name }}</h1>
    <h3 class="page-header">Semestre: </h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Materia</th>
            <th>Maestro</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($groups as $group)
          <tr>
            <td>{{ $group->subject->name }}</td>
            <td>{{ $group->teachers()->first()->name }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('groups.edit', ['groupId' => $group->id]) }}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
      <form method="post" action="{{ route('groups.enroll_level', $student->id) }}">
        {{ csrf_field() }}
        <select name="semester_id">
          @foreach($semesters as $semester)
            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
          @endforeach
        </select>
        <button class="btn btn-primary">Inscribir clases nivel: {{ $student->level->name }}</button>
      </form>
    </div>
  </div>
</div>
@endsection