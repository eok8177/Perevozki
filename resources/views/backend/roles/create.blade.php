@extends('backend.layouts.admin')

@section('content')
  <div class="role-heading">
    <h1 class="role-title">Add role</h1>
  </div>

  {!! Form::open(['route' => ['admin.roles.store'], 'method' => 'POST']) !!}
  @include('backend.roles.form')
  {{ Form::close() }}
@endsection