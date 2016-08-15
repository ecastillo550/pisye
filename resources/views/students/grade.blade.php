@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Clase: {{ $class->name }}</div>

				<div class="panel-body">
					<form method="post" action="{{ route('students.grade', [$student->id, $class->id]) }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<table class="table table-striped">
						<tr>
							<td>Parcial 1</td>
							<td>
								<input type="number" min="0" max="100" name="grade1" value="{{ $class->students->find($student->id)->pivot->grade1 or null }}">
							</td>
						</tr>
						<tr>
							<td>Parcial 2</td>
							<td>
								<input type="number" min="0" max="100" name="grade2" value="{{ $class->students->find($student->id)->pivot->grade2 or null }}">
							</td>
						</tr>
						<tr>
                            <td>Comentarios</td>
                            <td>
                            	<textarea name="comments">{{ $class->students->find($student->id)->pivot->comments or null }}</textarea>
                            </td>
                        </tr>
					</table>
					<input type="submit" class="btn btn-primary" value="Guardar">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
