@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Niveles</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <table class="table table-striped">
        <tr>
            <td>Nombre</td>
        </tr>
    @foreach($levels as $level)
        <tr>
            <td>{{$level->name}}</td>
        </tr>
    @endforeach
    </table>
</div>
@endsection
