@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inscribir</div>

				<div class="panel-body">
					<h3>{{ $student->name }}</h3>
					<form method="post" action="{{ route('students.enroll', $student->id) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<table class="table table-striped">
							<tr>
								<td>Inscribir a</td>
								<td>
									<select name="classId">
										<option value="">Selecciona una clase</option>
									@foreach($classes as $class)
										<option value="{{ $class->id }}">{{ $class->name }}</option>
									@endforeach
									</select>
								</td>
								<td><input class="btn btn-primary" type="Submit" value="Inscribir"></td>
							</tr>
						</table>
					</form>
					<table class="table table-striped">
						<tr>
							<td>Clase</td>
						</tr>
					@foreach($student->classes as $class)
						<tr>
							<td>{{ $class->name }}</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
