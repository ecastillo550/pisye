@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Clase</div>

				<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<td>Clase</td>
						<td></td>
					</tr>
				@foreach($classes as $class)
					<tr>
						<td>{{ $class->name }}</td>
						<td><a class="btn btn-primary" href="{{ route('teacher.class', $class->id) }}">ver</td>
					</tr>
				@endforeach
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
