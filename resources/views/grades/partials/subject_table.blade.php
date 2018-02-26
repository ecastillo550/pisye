<div class="table-responsive" style="margin: 5px;">
  <table class="table table-bordered subject" width="100%" cellspacing="0">
    <thead>
      <tr>
          <th class="title">
            @if(!$group->subject->hide_title)
                {{ $group->subject->name }}
            @endif
          </th>
          @foreach($group->semester->partials->sortBy('order') as $partial)
            <th>{{ $partial->name }}</th>
          @endforeach
      </tr>
    </thead>
    <tbody>
      @if ($group->subject->type == 1)
      <tr>
        <td>Cuantitativa</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first())
            ? number_format($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->cuantitative, 0)
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Participación</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->participation)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->participation)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Puntualidad</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->punctuality)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->punctuality)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Disposición para trabajar</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->working_disposition)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->working_disposition)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Entrega de tareas</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->homework)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->homework)->code
            : null }}
          </td>
        @endforeach
      </tr>
      @endif

      @if ($group->subject->type == 2)
      <tr>
        <td>Higiene</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->hygiene)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->hygiene)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Presentaci&oacute;n personal</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->presentation)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->presentation)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Limpieza al trabajar</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->cleanliness)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->cleanliness)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Integraci&oacute;n con compa&ntilde;eros de grupo</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->integration)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->integration)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Inasistencias</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first())
            ? number_format($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->absence, 0)
            : null }}
          </td>
        @endforeach
      </tr>
      @endif


      @if ($group->subject->type == 3)
      <tr>
        <td>Destreza manual</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->manual_dexterity)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->manual_dexterity)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Selecci&oacute;n/discriminaci&oacute;n de material</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->material_selection)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->material_selection)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Seguimiento de instrucciones</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->instructions)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->instructions)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Atenci&oacute;n y concentraci&oacute;n</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->concentration)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->concentration)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Resoluci&oacute;n de problemas</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->problem_resolution)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->problem_resolution)->code
            : null }}
          </td>
        @endforeach
      </tr>
      @endif


      @if ($group->subject->type == 4)
      <tr>
        <td>Disposici&oacute;n para trabajar</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->working_disposition)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->working_disposition)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Trabajo en equipo</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->teamwork)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->teamwork)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Iniciativa</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->initiative)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->initiative)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Toma de decisiones</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->desicion_making)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->desicion_making)->code
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Puntualidad en horas de trabajo</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td class="text-center">
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->problem_resolution)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->problem_resolution)->code
            : null }}
          </td>
        @endforeach
      </tr>
      @endif
    </tbody>
  </table>
</div>