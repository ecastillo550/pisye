@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Clase: {{ $class->name }}</div>

                <div class="panel-body">
                    <h3>{{ $class->name }}</h3>
                    <table class="table table-striped">
                        <tr>
                            <td>Nombre</td>
                            <td>Parcial 1</td>
                            <td>Parcial 2</td>
                            <td></td>
                        </tr>
                    @foreach($class->students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->pivot->grade1 }}</td>
                            <td>{{ $student->pivot->grade2 }}</td>
                            <td><a class="btn btn-primary" href="{{ route('students.grade', [$student->id, $class->id]) }}">Calificar</a></td>
                        </tr>
                    @endforeach 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
