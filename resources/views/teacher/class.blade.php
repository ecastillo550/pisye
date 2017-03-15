@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clase: {{ $class->name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
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
            @foreach($class->semester->partials->sortBy('order') as $partial)
                <td><a href="{{ route('students.grade.partial', [$student->id, $class->id, $partial->id]) }}">
                {{ !empty($student->grades)
                && !empty($student->grades->where('class_id', $class->id)->where('partial_id', $partial->order)->first())
                ? $student->grades->where('class_id', $class->id)->where('partial_id', $partial->order)->first()->cuantitative
                : 0 }}</a></td>
            @endforeach
            <td><a class="btn btn-primary" href="{{ route('students.grade', [$student->id, $class->id]) }}">Calificar</a></td>
        </tr>
    @endforeach
    </table>
</div>
@endsection
