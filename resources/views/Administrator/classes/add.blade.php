@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Clase</div>

                <div class="panel-body">
                    <form method="post" action="{{ route('administrator.classes.add') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="name" placeholder="Nombre">
                        <select name="subjectId">
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        <select name="userId">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <input type="Submit" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
