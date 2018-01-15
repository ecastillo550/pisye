@extends('layouts.app_in_hotels')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Alumnos</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Alumnos
    </div>
    <div class="card-body">
      <a class="btn btn-primary sm-gutter-bot" href="{{ route('students.create', ['hotelId' => $hotel->id]) }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Fecha de creación</th>
              <th>Fecha de actualización</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $student)
            <tr>
              <td>{{ $student->name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->created_at }}</td>
              <td>{{ $student->updated_at }}</td>
              <td>
                <a class="btn btn-primary" href="{{ route('students.edit', ['studentId' => $student->id]) }}">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection