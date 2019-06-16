@extends('backend.layouts.admin')

@section('content')
  <div class="page-heading">
    <h1 class="page-title">Edit {{$page->type}} page {{ $page->id }}</h1>
  </div>

  {!! Form::open(['route' => ['admin.pages.update', $page->id], 'method' => 'PUT']) !!}
  <input type="hidden" name="type" value="{{$page->type}}">
  @include('backend.pages.form_'.$page->type)
  {{ Form::close() }}

@endsection