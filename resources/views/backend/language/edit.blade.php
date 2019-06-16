@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit language</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            {{ Form::open(['route' => ['admin.language.update', $lang->id], 'method' => 'put']) }}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $lang->name, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
                @if($errors->has('name'))
                    <span class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('locale', 'Locale') }}
                {{ Form::text('locale', $lang->locale, ['class' => $errors->has('locale') ? 'form-control is-invalid' : 'form-control']) }}
                @if($errors->has('locale'))
                    <span class="invalid-feedback">
                            {{ $errors->first('locale') }}
                        </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('status', 'Status') }}
                {{ Form::select('status', [true => 'Yes', false => 'No'], $lang->status, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control']) }}
                @if($errors->has('status'))
                    <span class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection