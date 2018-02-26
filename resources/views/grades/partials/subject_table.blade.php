<div class="table-responsive" style="margin: 5px;">
  <table class="table table-bordered subject" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th class="title">{{ $group->subject->name }}</th>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <th>{{ $partial->name }}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cualitativa</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td>
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first())
            ? $student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->cuantitative
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Participación</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td>
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->participation)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->participation)->name
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Puntualidad</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td>
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->punctuality)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->punctuality)->name
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Disposición para trabajar</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td>
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->working_disposition)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->working_disposition)->name
            : null }}
          </td>
        @endforeach
      </tr>

      <tr>
        <td>Entrega de tareas</td>
        @foreach($group->semester->partials->sortBy('order') as $partial)
          <td>
            {{ !empty($student->grades)
            && !empty($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->homework)
            ? App\Model\CualitativeGrade::find($student->grades->where('group_id', $group->id)->where('partial_id', $partial->id)->first()->homework)->name
            : null }}
          </td>
        @endforeach
      </tr>
    </tbody>
  </table>
</div>