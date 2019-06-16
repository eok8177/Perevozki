@extends('backend.layouts.admin')

@section('content')
  <div class="setting-heading">
    <h1 class="setting-title">Edit setting</h1>
  </div>

  {!! Form::open(['route' => ['admin.settings.update'], 'method' => 'PUT']) !!}
{{ dd($settings['post_count']) }}
    <div class="ibox-body">
      <div class="form-group">
          {{ Form::label('post_count', 'Post count') }}
          {{ Form::text('post_count', $settings['post_count'], ['class' => $errors->has('post_count') ? 'form-control is-invalid' : 'form-control']) }}
          @if($errors->has('post_count'))
              <span class="invalid-feedback">
                  {{ $errors->first('post_count') }}
              </span>
          @endif
      </div>
      <div class="ibox-footer pl-3">
        <button class="btn btn-success" type="submit"><span class="active-hidden"><i class="fa fa-check"></i></span> Save</button>
        <a class="btn btn-warning" href="/admin/settings"><span class="active-hidden"><i class="fa fa-reply"></i></span> Cancel</a>
      </div>
    </div>

  {{ Form::close() }}

@endsection