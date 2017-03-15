@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clases de: {{ $student->name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <table class="table table-striped">
        <tr>
            <td>Clase</td>
        </tr>
    @foreach($student->classes as $class)
        <tr>
            <td>{{$class->name}}</td>
        </tr>
    @endforeach
    </table>
    <a class="btn btn-primary" href="{{ route('students.enroll', $student->id) }}">Inscribir a clases</a>
</div>
@endsection
