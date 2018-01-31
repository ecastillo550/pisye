@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clase: {{ $group->subject->name }}, {{ $group->semester->name }}</h1>
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
            @foreach($group->semester->partials->sortBy('order') as $partial)
                <td style="text-align: center;">{{ $partial->name }}</td>
            @endforeach
        </tr>
    @foreach($group->students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            @foreach($group->semester->partials->sortBy('order') as $partial)
                <td class="no-pad"><a class="boton-cal" href="{{ route('grades.partial', [$student->id, $group->id, $partial->id]) }}">
                {{ !empty($student->grades)
                && !empty($student->grades->where('class_id', $group->id)->where('partial_id', $partial->order)->first())
                ? $student->grades->where('class_id', $group->id)->where('partial_id', $partial->order)->first()->cuantitative
                : 0 }}</a></td>
            @endforeach
        </tr>
    @endforeach
    </table>
</div>
@endsection
