@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Agregar Usuario</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <form method="post" action="{{ route('users.add') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="username" placeholder="Usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <select name="roleId">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
            @endforeach
        </select>
        <input type="Submit" value="Guardar">
    </form>
</div>
@endsection
