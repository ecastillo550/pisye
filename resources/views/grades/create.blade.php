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

    @if ($group->subject->type == 1)
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
    @endif

    @if ($group->subject->type == 2)
      <tr>
        <td>Higiene</td>
        <td>
          <select name="hygiene">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && !empty($grade->hygiene) && $grade->hygiene == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Presentaci&oacute;n personal</td>
        <td>
          <select name="presentation">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->presentation && $grade->presentation == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Limpieza al trabajar</td>
        <td>
          <select name="cleanliness">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->cleanliness && $grade->cleanliness == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Integraci&oacute;n con compa&ntilde;eros de grupo</td>
        <td>
          <select name="integration">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->integration && $grade->integration == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Inasistencias</td>
        <td>
          <input type="number" min="0" max="100" name="absence" value="{{ $grade->absence or 0 }}">
        </td>
      </tr>
    @endif

    @if ($group->subject->type == 3)
      <tr>
        <td>Destreza manual</td>
        <td>
          <select name="manual_dexterity">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && !empty($grade->manual_dexterity) && $grade->manual_dexterity == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Selecci&oacute;n/discriminaci&oacute;n de material</td>
        <td>
          <select name="material_selection">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->material_selection && $grade->material_selection == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Seguimiento de instrucciones</td>
        <td>
          <select name="instructions">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->instructions && $grade->instructions == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Atenci&oacute;n y concentraci&oacute;n</td>
        <td>
          <select name="concentration">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->concentration && $grade->concentration == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Resoluci&oacute;n de problemas</td>
        <td>
          <select name="problem_resolution">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->problem_resolution && $grade->problem_resolution == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
    @endif

    @if ($group->subject->type == 4)
      <tr>
        <td>Disposici&oacute;n para trabajar</td>
        <td>
          <select name="working_disposition">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && !empty($grade->working_disposition) && $grade->working_disposition == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Trabajo en equipo</td>
        <td>
          <select name="teamwork">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->teamwork && $grade->teamwork == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Iniciativa</td>
        <td>
          <select name="initiative">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->initiative && $grade->initiative == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Toma de decisiones</td>
        <td>
          <select name="desicion_making">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->desicion_making && $grade->desicion_making == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td>Puntualidad en horas de trabajo</td>
        <td>
          <select name="punctuality">
            @foreach ($cualitativeGrades as $cualitative)
              <option value="{{ $cualitative->id }}" {{ !empty($grade) && $grade->punctuality && $grade->punctuality == $cualitative->id ? 'selected' : null }}>{{ $cualitative->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>
    @endif

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
