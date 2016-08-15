@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Clases de: {{ $student->name }}</div>

                <div class="panel-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
