@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clases</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
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
@endsection
