@extends('backend.layouts.admin')

@section('content')
  <div class="user-heading">
    <h1 class="user-title">Edit user {{ $user->id }}</h1>
  </div>

  {!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
  @include('backend.users.form')
  {{ Form::close() }}

@endsection