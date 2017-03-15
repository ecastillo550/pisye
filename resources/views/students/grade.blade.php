@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clase: {{ $class->name }}, Parcial: {{ $partial->name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<form method="post" action="{{ route('students.grade.partial', [$student->id, $class->id, $partial->id]) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<table class="table table-striped">
		<tr>
			<td>Cuantitativo</td>
			<td>
				<input type="number" min="0" max="100" name="cuantitative" value="{{ $grade->cuantitative or 0}}">
			</td>
		</tr>
		<tr>
			<td>Participación</td>
			<td>
				<select name="participation">
					<option value="1" {{!empty($grade)&&$grade->participation&&$grade->participation==1?'selected':null}}>No logrado</option>
					<option value="2" {{!empty($grade)&&$grade->participation&&$grade->participation==2?'selected':null}}>En proceso</option>
					<option value="3" {{!empty($grade)&&$grade->participation&&$grade->participation==3?'selected':null}}>Regular</option>
					<option value="4" {{!empty($grade)&&$grade->participation&&$grade->participation==4?'selected':null}}>Bien</option>
					<option value="5" {{!empty($grade)&&$grade->participation&&$grade->participation==5?'selected':null}}>Muy bien</option>
					<option value="6" {{!empty($grade)&&$grade->participation&&$grade->participation==6?'selected':null}}>Excelente</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Puntualidad</td>
			<td>
				<select name="punctuality">
					<option value="1" {{!empty($grade)&&$grade->punctuality&&$grade->punctuality==1?'selected':null}}>No logrado</option>
					<option value="2" {{!empty($grade)&&$grade->punctuality&&$grade->punctuality==2?'selected':null}}>En proceso</option>
					<option value="3" {{!empty($grade)&&$grade->punctuality&&$grade->punctuality==3?'selected':null}}>Regular</option>
					<option value="4" {{!empty($grade)&&$grade->punctuality&&$grade->punctuality==4?'selected':null}}>Bien</option>
					<option value="5" {{!empty($grade)&&$grade->punctuality&&$grade->punctuality==5?'selected':null}}>Muy bien</option>
					<option value="6" {{!empty($grade)&&$grade->punctuality&&$grade->punctuality==6?'selected':null}}>Excelente</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Disposición para trabajar</td>
			<td>
				<select name="working_disposition">
					<option value="1" {{!empty($grade)&&$grade->working_disposition&&$grade->working_disposition==1?'selected':null}}>No logrado</option>
					<option value="2" {{!empty($grade)&&$grade->working_disposition&&$grade->working_disposition==2?'selected':null}}>En proceso</option>
					<option value="3" {{!empty($grade)&&$grade->working_disposition&&$grade->working_disposition==3?'selected':null}}>Regular</option>
					<option value="4" {{!empty($grade)&&$grade->working_disposition&&$grade->working_disposition==4?'selected':null}}>Bien</option>
					<option value="5" {{!empty($grade)&&$grade->working_disposition&&$grade->working_disposition==5?'selected':null}}>Muy bien</option>
					<option value="6" {{!empty($grade)&&$grade->working_disposition&&$grade->working_disposition==6?'selected':null}}>Excelente</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Entrega de tareas</td>
			<td>
				<select name="homework">
					<option value="1" {{!empty($grade)&&$grade->homework&&$grade->homework==1?'selected':null}}>No logrado</option>
					<option value="2" {{!empty($grade)&&$grade->homework&&$grade->homework==2?'selected':null}}>En proceso</option>
					<option value="3" {{!empty($grade)&&$grade->homework&&$grade->homework==3?'selected':null}}>Regular</option>
					<option value="4" {{!empty($grade)&&$grade->homework&&$grade->homework==4?'selected':null}}>Bien</option>
					<option value="5" {{!empty($grade)&&$grade->homework&&$grade->homework==5?'selected':null}}>Muy bien</option>
					<option value="6" {{!empty($grade)&&$grade->homework&&$grade->homework==6?'selected':null}}>Excelente</option>
				</select>
			</td>
		</tr>
		<tr>
            <td>Comentarios</td>
            <td>
            	<textarea name="comments">{{ !empty($grade)&&$grade->comments or null }}</textarea>
            </td>
        </tr>
	</table>
	<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
</div>
@endsection
