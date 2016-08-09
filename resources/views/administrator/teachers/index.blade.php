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
                        </tr>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <a class="button" href="{{ route('administrator.students.add') }}">Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
