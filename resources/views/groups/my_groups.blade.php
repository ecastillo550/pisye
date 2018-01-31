@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('groups.index') }}">Grupos</a>
  </li>
  <li class="breadcrumb-item active">Mis grupos</li>
</ol>

<div class="card mb-3">
  <div class="card-header">
    Mis Grupos
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Materia</th>
            <th>Nivel</th>
            <th>Maestro</th>
            <th>Semestre</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($groups as $group)
          <tr>
            <td>{{ $group->subject->name }}</td>
            <td>{{ $group->level->name }}</td>
            <td>{{ $group->teachers->first()->name }}</td>
            <td>{{ $group->semester->name }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('groups.student_list', $group->id) }}">
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