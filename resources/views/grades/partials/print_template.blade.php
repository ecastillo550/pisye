<div class="blank_space">
</div>
<div class="header">
  <div class="container">
    <h1>Universidad de Monterrey</h1>
    <h2>División de Educacación y Humanidades</h2>
    <h3>Programa de Inclusión Social y Educativa (PISYE)</h3>
  </div>
</div>
<div class="subheader">
  <div class="left">
    <div class="container">
      <h3>Reporte de Calificaciones</h3>
      <p>Periodo: Primavera 2018</p>
    </div>
  </div>
  <div class="right">
    <p>Nombre del alumno: {{ $student->name }}</p>
    <p>Matrícula: {{ $student->enrollment }}</p>
    <p>Semestre: {{ $student->semester or null }}</p>
  </div>
</div>
<table class="subject-container">
  {{ $n = 0 }}
  @foreach ($student->enrolledNormal as $group)
  @if ($n%2 == 0)
  <tr>
  @endif
    <td class="row {{ ($n%2 == 0) ? 'left' : 'right' }}">
      @include('grades.partials.subject_table')
    </td>
  @if ($n%2 == 0)
  </tr>
  @endif
  {{ $n++ }}
  @endforeach
</table>

<div class="wordbank">
  <div class="float-left">
    <ul>
      <li><span>E</span> Excelente</li>
      <li><span>MB</span> Muy Bien</li>
      <li><span>B</span> Bien</li>
      <li><span>R</span> Regular</li>
      <li><span>EP</span> En Proceso</li>
      <li><span>NL</span> No Logrado</li>
    </ul>
  </div>
  <div class="float-left">
    <ul>
      <li><span>NA</span> No Aplica</li>
      <li><span>EF</span> Exceso de Faltas</li>
      <li><span>CI</span> Clase Integrada</li>
      <li><span>PL</span> Prácticas Laborales</li>
      <li><span>NE</span> No entreg&oacute; el maestro</li>
    </ul>
  </div>
</div>

@if ($student->level->id == 2 || $student->level->id == 3)
<div class="divider">
</div>
<table class="subject-container">
  {{ $n = 0 }}
  @foreach ($student->enrolledWorkshop as $group)
  @if ($n%2 == 0)
  <tr>
  @endif
    <td class="row {{ ($n%2 == 0) ? 'left' : 'right' }}">
      @include('grades.partials.subject_table')
    </td>
    @if (count($student->enrolledWorkshop) % 2 != 0)
      @if ($n == count($student->enrolledWorkshop)-1)
        <td>
          <p style="margin:0;"><span style="font-weight: bold;">BL</span> Bien Logrado: se desempeña de manera excelente</p>
          <p style="margin:0;"><span style="font-weight: bold;">L</span> Logrado: se desempeña de manera satisfactoria</p>
          <p style="margin:0;"><span style="font-weight: bold;">LD</span> Logrado con dificultad: recibe apoyo al reapzar la tarea</p>
          <p style="margin:0;"><span style="font-weight: bold;">EP</span> En Proceso: competencias en vías de desarrollo</p>
          <p style="margin:0;"><span style="font-weight: bold;">NL</span> No Logrado: habilidades necesarias aún no desarrolladas</p>
        </td>
      @endif
    @endif
  @if ($n%2 == 0)
  </tr>
  @endif
  {{ $n++ }}
  @endforeach
</table>
@endif

@if ($student->level->id == 2 || $student->level->id == 3)
<div class="mini_blank_space">
</div>
@endif

<div class="comments">
  <p>Observaciones:
  @foreach ($student->enrolled as $group)
    @foreach($group->semester->partials->sortBy('order') as $partial)
      {{ !empty($student->grades)
      && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first())
      && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->comments)
      ? $group->subject->name . ', ' . $partial->name . ': ' . $student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->comments
      : null }}
    @endforeach
  @endforeach
  </p>
</div>