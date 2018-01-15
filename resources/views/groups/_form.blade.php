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
    <label for="name">Nombre:</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="email">Email:</label>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="pwd">Contraseña:</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="confirm-pwd">Confirmar contraseña:</label>
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}