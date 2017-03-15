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

    {{ $students->links() }}
</div>
@endsection
