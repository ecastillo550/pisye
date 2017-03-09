@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Materias</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Nombre</td>
                        </tr>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{$subject->name}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <a class="btn btn-primary" href="{{ route('subjects.add') }}">Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
