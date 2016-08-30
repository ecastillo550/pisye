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
							<td>Cuantitativo</td>
							<td>
								<input type="number" min="0" max="100" name="cuantitative" value="">
							</td>
						</tr>
						<tr>
							<td>Participación</td>
							<td>
								<select name="participationId"> 
									<option value="1">No logrado</option>
									<option value="2">En proceso</option>
									<option value="3">Regular</option>
									<option value="4">Bien</option>
									<option value="5">Muy bien</option>
									<option value="6">Excelente</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Puntualidad</td>
							<td>
								<select name="participationId"> 
									<option value="1">No logrado</option>
									<option value="2">En proceso</option>
									<option value="3">Regular</option>
									<option value="4">Bien</option>
									<option value="5">Muy bien</option>
									<option value="6">Excelente</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Disposición para trabajar</td>
							<td>
								<select name="participationId"> 
									<option value="1">No logrado</option>
									<option value="2">En proceso</option>
									<option value="3">Regular</option>
									<option value="4">Bien</option>
									<option value="5">Muy bien</option>
									<option value="6">Excelente</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Entrega de tareas</td>
							<td>
								<select name="participationId"> 
									<option value="1">No logrado</option>
									<option value="2">En proceso</option>
									<option value="3">Regular</option>
									<option value="4">Bien</option>
									<option value="5">Muy bien</option>
									<option value="6">Excelente</option>
								</select>
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