@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Alumnos</div>

                <div class="panel-body">
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td>Materia</td>
                            <td>Profesor</td>
                        </tr>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{$class->name}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <a class="btn btn-primary" href="{{ route('administrator.classes.add') }}">Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
