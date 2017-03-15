@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Alumnos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="panel">
        <form method="get" action="{{ route('students.index') }}">
            <select name="filter">
                @foreach($levels as $level)
                    <option {{ !empty('$filter') && $filter == $level->id ? 'selected' : null }} value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
            <input class="btn btn-primary" type="Submit" value="Filtrar">
        </form>
    </div>
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
    @if(empty($filter))
        {{ $students->links() }}
    @endif
</div>
@endsection
