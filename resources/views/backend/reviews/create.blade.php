@extends('backend.layouts.admin')

@section('content')
  <div class="review-heading">
    <h1 class="review-title">Add review</h1>
  </div>

  {!! Form::open(['route' => ['admin.reviews.store'], 'method' => 'POST']) !!}
  @include('backend.reviews.form')
  {{ Form::close() }}
@endsection