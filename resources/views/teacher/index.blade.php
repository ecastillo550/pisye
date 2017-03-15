@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clase</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<table class="table table-striped">
		<tr>
			<td>Nivel</td>
			<td>Materia</td>
			<td></td>
		</tr>
	@foreach($classes as $class)
		<tr>
			<td>{{ $class->level->name }}</td>
			<td>{{ $class->subject->name }}</td>
			<td><a class="btn btn-primary" href="{{ route('teacher.class', $class->id) }}">ver</td>
		</tr>
	@endforeach
	</table>
</div>
@endsection
