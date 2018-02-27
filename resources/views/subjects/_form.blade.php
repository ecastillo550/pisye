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
    @if(empty($subject))
    {!! Form::model($subject = null, ['route' => ['subjects.store'], 'method' => 'post']) !!}
    @else
    {!! Form::model($subject, ['route' => ['subjects.update', $subject->id]]) !!}
    {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="name">Nombre:</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      <select name="type" class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">
        <option value="1" {{ $subject->type == 1 ? 'selected' : ''  }}>Set 1</option>
        <option value="2" {{ $subject->type == 2 ? 'selected' : ''  }}>Set 2</option>
        <option value="3" {{ $subject->type == 3 ? 'selected' : ''  }}>Set 3</option>
        <option value="4" {{ $subject->type == 4 ? 'selected' : ''  }}>Set 4</option>
      </select>
    </div>
    <div class="form-group">
      <select name="hide_title" class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">
        <option value="true" {{ $subject->hide_title == true ? 'selected' : ''  }}>Esconder título en boleta</option>
        <option value="false" {{ $subject->hide_title == null ? 'selected' : ''  }}>No esconder título</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    {!! Form::close() !!}
  </div>
</div>