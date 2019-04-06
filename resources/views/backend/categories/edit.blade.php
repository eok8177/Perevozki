@extends('backend.layouts.admin')

@section('content')
  <div class="category-heading">
    <h1 class="category-title">Edit category {{ $category->id }}</h1>
  </div>

  {!! Form::open(['route' => ['admin.categories.update', $category->id], 'method' => 'PUT']) !!}
  @include('backend.categories.form')
  {{ Form::close() }}

@endsection