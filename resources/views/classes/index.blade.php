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
				<td>Semestre</td>
				<td>Nivel</td>
				<td>Materia</td>
			</tr>
		@foreach($classes as $class)
			<tr>
				<td>{{ $class->semester->name }}</td>
				<td>{{ $class->level->name }}</td>
				<td>{{ $class->subject->name }}</td>
			</tr>
		@endforeach
		</table>
	</div>
</div>
@endsection
