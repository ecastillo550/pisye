@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clase: {{ $class->name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<style type="text/css">
    .boton-cal:hover {
        background-color: #c2c2c2;
    }
    .boton-cal {
        display: block;
        width: 100%;
        height: 100%;
        line-height: 2;
    }
    .no-pad {
        padding: 0 0 0 8px !important;
        vertical-align: inherit !important;
        margin: 0 !important;
        text-align: center;
    }
</style>
<div class="row">
    <table class="table table-striped">
        <tr>
            <td>Nombre</td>
            @foreach($class->semester->partials->sortBy('order') as $partial)
                <td style="text-align: center;">{{ $partial->name }}</td>
            @endforeach
            <td></td>
        </tr>
    @foreach($class->students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            @foreach($class->semester->partials->sortBy('order') as $partial)
                <td class="no-pad"><a class="boton-cal" href="{{ route('students.grade.partial', [$student->id, $class->id, $partial->id]) }}">
                {{ !empty($student->grades)
                && !empty($student->grades->where('class_id', $class->id)->where('partial_id', $partial->order)->first())
                ? $student->grades->where('class_id', $class->id)->where('partial_id', $partial->order)->first()->cuantitative
                : 0 }}</a></td>
            @endforeach
           <!--  <td><a class="btn btn-primary" href="{{ route('students.grade', [$student->id, $class->id]) }}">Calificar</a></td> -->
        </tr>
    @endforeach
    </table>
</div>
@endsection
