@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuarios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <table class="table table-striped">
        <tr>
            <td>Nombre</td>
            <td>Rol</td>
        </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->roles()->first()->display_name}}</td>
        </tr>
    @endforeach
    </table>
</div>
@endsection
