@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Grupos</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Grupos
    </div>
    <div class="card-body">
      <a class="btn btn-primary sm-gutter-bot" href="{{ route('groups.create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Materia</th>
              <th>Semestre</th>
              <th>Maestro</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($groups as $group)
            <tr>
              <td>{{ $group->subject }}</td>
              <td>{{ $group->semester }}</td>
              <td>{{ $group->teacher }}</td>
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
    </div>
  </div>
</div>
@endsection