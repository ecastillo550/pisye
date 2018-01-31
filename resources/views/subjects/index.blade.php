@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Materias</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    <a class="btn btn-primary sm-gutter-bot" href="{{ route('subjects.create') }}"> Crear Materia <i class="fa fa-plus" aria-hidden="true"></i></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($subjects as $subject)
          <tr>
            <td>{{ $subject->name }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('subjects.edit', ['subjectId' => $subject->id]) }}">
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
@endsection