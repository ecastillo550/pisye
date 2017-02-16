@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Clases</div>
				<a class="btn btn-primary" href="{{ route('administrator.classes.add') }}">Nuevo</a>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<td>Materia</td>
							<td>Nivel</td>
							<td>Profesor</td>
							<td>Nivel</td>
						</tr>
					@foreach($classes as $class)
						<tr>
							<td>{{ $class->name }}</td>
							<td>{{ $class->subject->name }}</td>
							<td>{{ $class->teacher->name }}</td>
							<td>{{ $class->level->name }}</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
