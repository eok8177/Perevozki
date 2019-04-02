@extends('backend.layouts.admin')

@section('content')
  <div class="page-heading">
    <h1 class="page-title">Edit page {{ $page->id }}</h1>
  </div>

  {!! Form::open(['route' => ['admin.pages.update', $page->id], 'method' => 'PUT']) !!}
  @include('backend.pages.form')
  {{ Form::close() }}

@endsection