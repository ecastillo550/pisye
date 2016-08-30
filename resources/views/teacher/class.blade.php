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
                            @foreach($class->semester->partials->sortBy('order') as $partial)
                                <td>{{ $partial->name }}</td>
                            @endforeach
                            <td></td>
                        </tr>
                    @foreach($class->students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            @foreach($class->semester->partials as $partial)
                                <td><a href="{{ route('students.grade.partial', [$student->id, $class->id, $partial->id]) }}">{{ $student->grades->where('class_id', $class->id)->where('partial_id', $partial->id)->cuantitative or 0}}</a></td>
                            @endforeach
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
