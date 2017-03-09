@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Alumnos</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Nombre</td>
                            <td>Ver clases</td>
                        </tr>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td><a class="btn btn-primary" href="{{ route('classes.byStudent', $student->id) }}">Ver</a></td>
                        </tr>
                    @endforeach
                    </table>
                    <a class="btn btn-primary" href="{{ route('students.add') }}">Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
