@extends('backend.layouts.admin')

@section('content')
  <div class="role-heading">
    <h1 class="role-title">Edit role {{ $role->id }}</h1>
  </div>

  {!! Form::open(['route' => ['admin.roles.update', $role->id], 'method' => 'PUT']) !!}
  @include('backend.roles.form')
  {{ Form::close() }}

@endsection