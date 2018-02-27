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
    @if(empty($student))
    {!! Form::model($student = null, ['route' => ['students.store'], 'method' => 'post']) !!}
    @else
    {!! Form::model($student, ['route' => ['students.update', $student->id]]) !!}
    {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="enrollment">Matricula:</label>
        {!! Form::text('enrollment', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="name">Nombre:</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="semester">Semestre:</label>
        {!! Form::text('semester', null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
      <div class="col-9">
        <div class="form-group">
            <label for="username">Usuario:</label>
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
            <label for="level_id">Nivel:</label>
            <select id="level_id" name="level_id" class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">
              @foreach($levels as $level)
                <option value="{{ $level->id }}" {{ !empty($student) && ($student->level != null && $student->level->id == $level->id) ? 'selected' : ''  }}>{{ $level->name }}</option>
              @endforeach
            </select>
          </div>
      </div>
    </div>
    <div class="form-group">
        <label for="pwd">Contraseña:</label>
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="confirm-pwd">Confirmar contraseña:</label>
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>