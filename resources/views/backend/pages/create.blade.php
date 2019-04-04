@extends('backend.layouts.admin')

@section('content')
  <div class="page-heading">
    <h1 class="page-title">Add page</h1>
  </div>

  {!! Form::open(['route' => ['admin.pages.store'], 'method' => 'POST']) !!}
  @include('backend.pages.form')
  {{ Form::close() }}
@endsection