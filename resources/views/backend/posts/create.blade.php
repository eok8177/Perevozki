@extends('backend.layouts.admin')

@section('content')
  <div class="post-heading">
    <h1 class="post-title">Add post</h1>
  </div>

  {!! Form::open(['route' => ['admin.posts.store'], 'method' => 'POST']) !!}
  @include('backend.posts.form')
  {{ Form::close() }}
@endsection