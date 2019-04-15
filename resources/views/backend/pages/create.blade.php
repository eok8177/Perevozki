@extends('backend.layouts.admin')

@section('content')
  <div class="page-heading">
    <h1 class="page-title">Add {{$page->type}} page</h1>
  </div>

  {!! Form::open(['route' => ['admin.pages.store'], 'method' => 'POST']) !!}
  <input type="hidden" name="type" value="{{$page->type}}">
  @include('backend.pages.form_'.$page->type)
  {{ Form::close() }}
@endsection