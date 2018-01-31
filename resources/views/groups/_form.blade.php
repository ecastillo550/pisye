<div class="row">
  <div class="col-12">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if($group->id == null)
    {!! Form::model($group = null, ['route' => ['groups.store'], 'method' => 'post']) !!}
    @else
    {!! Form::model($group, ['route' => ['groups.update', $group->id]]) !!}
    {{ method_field('PUT') }}
    @endif
    <div class="row">
    <div class="col-4">
      <div class="form-group form-group-default required">
        <label class="subject_id">Materia</label>
        <select name="subject_id" class="cs-select cs-skin-slide">
          @foreach($subjects as $subject)
          <option value="{{ $subject->id }}" {{ !empty($group) && ($group->subject != null && $group->subject->id == $subject->id) ? 'selected' : ''  }}>{{ $subject->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="form-group form-group-default required">
        <label class="level_id">Nivel</label>
        <select name="level_id" class="cs-select cs-skin-slide">
          @foreach($levels as $level)
          <option value="{{ $level->id }}" {{ !empty($group) && ($group->level != null && $group->level->id == $level->id) ? 'selected' : ''  }}>{{ $level->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="form-group form-group-default required">
        <label class="semester_id">Semestre</label>
        <select name="semester_id" class="cs-select cs-skin-slide">
          @foreach($semesters as $semester)
          <option value="{{ $semester->id }}" {{ !empty($group) && ($group->semester != null && $group->semester->id == $semester->id) ? 'selected' : ''  }}>{{ $semester->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="form-group form-group-default required">
        <label class="teacher_id">Maestro</label>
        <select name="teacher_id" class="cs-select cs-skin-slide">
          @foreach($teachers as $teacher)
          <option value="{{ $teacher->id }}" {{ !empty($group) && ($group->teachers->first() != null && $group->teachers->first()->id == $teacher->id) ? 'selected' : ''  }}>{{ $teacher->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>