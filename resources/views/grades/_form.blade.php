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
    @if(empty($level))
    {!! Form::model($level = null, ['route' => ['levels.store'], 'method' => 'post']) !!}
    @else
    {!! Form::model($level, ['route' => ['levels.update', $level->id]]) !!}
    {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="name">Nombre:</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>