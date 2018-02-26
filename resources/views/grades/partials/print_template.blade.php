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
@foreach ($student->enrolled as $group)
  <div class="subject">
    @include('grades.partials.subject_table')
  </div>
@endforeach
