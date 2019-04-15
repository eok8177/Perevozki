@extends('backend.layouts.admin')

@section('content')
  <div class="review-heading">
    <h1 class="review-title">Edit review {{ $review->id }}</h1>
  </div>

  {!! Form::open(['route' => ['admin.reviews.update', $review->id], 'method' => 'PUT']) !!}
  @include('backend.reviews.form')
  {{ Form::close() }}

@endsection