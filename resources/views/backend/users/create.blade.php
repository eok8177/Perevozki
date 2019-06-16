@extends('backend.layouts.admin')

@section('content')
  <div class="user-heading">
    <h1 class="user-title">Add user</h1>
  </div>

  {!! Form::open(['route' => ['admin.users.store'], 'method' => 'POST']) !!}
  @include('backend.users.form')
  {{ Form::close() }}
@endsection