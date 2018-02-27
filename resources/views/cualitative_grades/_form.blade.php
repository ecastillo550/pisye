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
    @if(empty($cualitativeGrade))
    {!! Form::model($cualitativeGrade = null, ['route' => ['cualitative_grades.store'], 'method' => 'post']) !!}
    @else
    {!! Form::model($cualitativeGrade, ['route' => ['cualitative_grades.update', $cualitativeGrade->id]]) !!}
    {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="name">Nombre:</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="name">Orden:</label>
        {!! Form::number('order', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    <select name="type" class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">
      <option value="1" {{ !empty($cualitativeGrade->type) && $cualitativeGrade->type == 1 ? 'selected' : ''  }}>Set 1</option>
      <option value="2" {{ !empty($cualitativeGrade->type) && $cualitativeGrade->type == 2 ? 'selected' : ''  }}>Set 2</option>
    </select>
  </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>