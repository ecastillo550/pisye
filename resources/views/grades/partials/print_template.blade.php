<div class="header">
  <h1>Universidad de Monterrey</h1>
  <h2>División de Educacación y Humanidades</h2>
  <h3>Programa de Inclusión Social y Educativa (PISYE)</h3>
</div>
<div class="subheader">
  <div class="left">
    <div class="container">
      <h3>Reporte de Calificaciones</h3>
      <p>Periodo: </p>
    </div>
  </div>
  <div class="right">
    <p>Nombre del alumno: {{ $student->name }}</p>
    <p>Matrícula: {{ $student->enrollment }}</p>
    <p>Semestre: </p>
  </div>
</div>
<table class="subject-container">
  {{ $n = 0 }}
  @foreach ($student->enrolled as $group)
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