@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Materia</div>

                <div class="panel-body">
                    <form method="post" action="{{ route('subjects.add') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="name" placeholder="Nombre">
                        <input type="Submit" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
