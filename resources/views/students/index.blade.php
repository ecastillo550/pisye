@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Alumnos</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <a class="btn btn-primary sm-gutter-bot" href="{{ route('students.create') }}"> Crear Alumno <i class="fa fa-plus" aria-hidden="true"></i></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Usuario</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
          <tr>
            <td>{{ $student->enrollment }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->level->name or null }}</td>
            <td>{{ $student->username }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('students.edit', ['studentId' => $student->id]) }}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
              <a class="btn" href="{{ route('groups.enrolled', $student->id) }}">
                Clases <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
              <a class="btn" target="_blank" href="{{ route('grades.print', $student->id) }}">
                Calificaciones <i class="fa fa-list" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection