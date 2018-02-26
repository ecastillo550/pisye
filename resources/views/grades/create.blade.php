@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $student->name }}</h1>
        <h3 class="page-header">Clase: {{ $group->subject->name }}, Parcial: {{ $partial->name }}</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <form method="post" action="{{ route('grades.store', ['student' => $student->id, 'group' => $group->id, 'partial' => $partial->id]) }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <table class="table table-striped">
    <tr>
      <td>Cuantitativo</td>
      <td>
        <input type="number" min="0" max="100" name="cuantitative" value="{{ $grade->cuantitative or 0 }}">
      </td>
    </tr>
    <tr>
      <td>Participación</td>
      <td>
        <select name="participation">
          @foreach ($cualitativeGrades as $cualitative)
            <option value="{{ $cualitative->id }}" {{ !empty($grade) && !empty($grade->participation) && $grade->participation == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <td>Puntualidad</td>
      <td>
        <select name="punctuality">
          @foreach ($cualitativeGrades as $cualitative)
            <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->punctuality && $grade->punctuality == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <td>Disposición para trabajar</td>
      <td>
        <select name="working_disposition">
          @foreach ($cualitativeGrades as $cualitative)
            <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->working_disposition && $grade->working_disposition == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <td>Entrega de tareas</td>
      <td>
        <select name="homework">
          @foreach ($cualitativeGrades as $cualitative)
            <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->homework && $grade->homework == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <td>Comentarios</td>
      <td>
        <textarea name="comments">{{ $grade->comments or null }}</textarea>
      </td>
    </tr>
  </table>
  <input type="submit" class="btn btn-primary" value="Guardar">
  </form>
</div>
@endsection
