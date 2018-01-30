@extends('layouts.app_in_organizations')

@section('content')
<div class="container-fluid">
  <ol class="breadcrumb">
    @role('super-admin')
    <li class="breadcrumb-item">
      <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ route('organizations.index') }}">Organizaciones</a>
    </li>
    @endrole
    <li class="breadcrumb-item">
      <a href="{{ route('organizations.home', ['id' => $organization->id]) }}">Menú de {{$organization->name}}</a>
    </li>  
    <li class="breadcrumb-item">
      <a href="{{ route('organizations.hotels.index', ['hotelId' => $hotel->id]) }}">{{$hotel->name}}</a>
    </li>  
    <li class="breadcrumb-item">
      <a href="{{ route('organizations.hotels.cashiers.index', ['hotelId' => $hotel->id]) }}">Cajeros</a>
    </li>
    <li class="breadcrumb-item active">Editar cajero</li> 
  </ol>
  
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-user" aria-hidden="true"></i></i> Editar cajero
    </div>
    <div class="card-body">
    @include('cashiers._form')
    </div>
  </div>
</div>
@endsection