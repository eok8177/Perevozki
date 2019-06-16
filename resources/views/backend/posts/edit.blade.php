@extends('backend.layouts.admin')

@section('content')
  <div class="post-heading">
    <h1 class="post-title">Edit post {{ $post->id }}</h1>
  </div>

  {!! Form::open(['route' => ['admin.posts.update', $post->id], 'method' => 'PUT']) !!}
  @include('backend.posts.form')
  {{ Form::close() }}

@endsection