@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inscribir a {{ $student->name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<form method="post" action="{{ route('students.enroll', $student->id) }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table class="table table-striped">
			<tr>
				<td>Inscribir a</td>
				<td>
					<select name="classId">
						<option value="">Selecciona una clase</option>
					@foreach($classes as $class)
						<option value="{{ $class->id }}">{{ $class->level->name }}-{{ $class->subject->name }}</option>
					@endforeach
					</select>
				</td>
				<td><input class="btn btn-primary" type="Submit" value="Inscribir"></td>
			</tr>
		</table>
	</form>
	<table class="table table-striped">
		<tr>
			<td>Nivel</td>
			<td>Materia</td>
			<td></td>
		</tr>
	@foreach($student->classes as $class)
		<tr>
			<td>{{ $class->level->name }}</td>
			<td>{{ $class->subject->name }}</td>
			<td>
				<form method="post" action="{{ route('students.disenroll', $student->id) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" value="{{ $class->id }}" name="classId">
				<input class="btn btn-warning" type="Submit" value="Desinscribir">
			</td>
		</tr>
	@endforeach
	</table>
</div>
@endsection
