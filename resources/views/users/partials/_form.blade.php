<?php 
  $isCreate = Request::is('*create*');
?>

{!! Form::token() !!} 
<div class="row">
  <div class="col-sm-12">      
    <div class="form-group form-group-default required">
      <label class="fade">Name(s)</label>
      {!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'placeholder' => 'Ej: John', 'required' => 'required']) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-9">
    <div class="form-group form-group-default required">
      <label class="fade">Email</label>
      {!! Form::text('email', old('email', $user->email), ['class' => 'form-control', 'placeholder' => 'Ej: johnMccoy@sisse.com', 'required' => 'required']) !!}
    </div>
  </div>
  <div class="col-sm-3">
    <select name="role_id" class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">
      @foreach($roles as $role)
      <option value="{{ $role->id }}" {{ $user->id > 0 && ($user->roles()->first() != null && $user->roles()->first()->id == $role->id) ? 'selected' : ''  }}>{{ $role->display_name }}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group form-group-default">
  <label class="fade">Password</label>
  {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Al menos 6 caracteres']) !!}
</div>

<button class="btn btn-primary" type="submit">{{ $isCreate ? 'Crear usuario' : 'Editar usuario' }}</button>

