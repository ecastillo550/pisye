@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
		<h3 class="page-title">Usuarios</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            
            <div class="pull-right">
              <div class="col-xs-12">
                <input type="text" id="search-table" class="form-control pull-right" placeholder="Buscar">
              </div>
            </div>
            <div class="clearfix"></div>

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
              <button class="close" data-dismiss="alert"></button>
              <strong>Error!</strong><br>
              @foreach($errors->all() as $error) 
                  {{ $error }} <br>
                @endforeach
            </div>
            @endif
          </div>
          <div class="card-block table-responsive">
            <table id="tableWithSearch" class="table table-hover demo-table-search table-responsive-block" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Rol</th>
                  <th>Creado</th>
                  <th>Suspendido</th>
                  <th>Accciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                <tr>
                  <td class="v-align-middle semi-bold">
                    <p>{{ $user->name or null }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $user->email or null }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $user->roles()->first() ? $user->roles()->first()->display_name : " " }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $user->created_at or null }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $user->deleted_at or null }} </p>
                  </td>
                  <td class="v-align-middle">
                    <div class="btn-group">
                      @if($user->deleted_at != null)
                      <a href="{{ route('users.restore', $user->id) }}" class="btn btn-success" data-toggle="tooltip" title="Restaurar"><i class="pg-refresh"></i></a>
                      @endif
                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning {{ $user->deleted_at != null ? 'disabled' : ''}}" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
                      <a href="" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('destroy-form{{$user->id}}').submit();" data-toggle="tooltip" title="{{ $user->deleted_at == null ? 'Suspender' : 'Eliminar'}}"><i class="fa fa-{{ $user->deleted_at == null ? 'ban' : 'trash-o'}}"></i></a>
                      <form id="destroy-form{{$user->id}}" action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ Form::hidden('_method', 'DELETE') }}
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
  //      $('#myDataTable').DataTable();

  var table = $('#tableWithSearch');

  var settings = {
      "sDom": "<'table-responsive't><'row'<p i>>",
      "sPaginationType": "bootstrap",
      "destroy": true,
      "pageLength": 10,
      "scrollCollapse": true,
      "oLanguage": {
        "sLengthMenu": "_MENU_ ",
        "sInfo": "Mostrando <b>_START_ a _END_</b> de _TOTAL_ entradas"
      },
      "iDisplayLength": 5,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "searching": true
  };

  var oTable =table.DataTable(settings);

  // search box for table
  $('#search-table').keyup(function() {
      oTable.search($(this).val()).draw() ;
  });
});
</script>
@endsection