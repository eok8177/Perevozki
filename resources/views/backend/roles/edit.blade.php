@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit pages {{ $page->id }}</div>
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
            {{ Form::open(['route' => ['admin.pages.update', $page->id], 'method' => 'put']) }}
                <div class="row">
                    <div class="col-sm-6 form-group">
                        {{ Form::label('slug', 'Slug') }}
                        {{ Form::text('slug', $page->slug, ['class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control']) }}
                        @if($errors->has('slug'))
                            <span class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-6 form-group">
                        {{ Form::label('status', 'Status') }}
                        {{ Form::select('status', [true => 'Yes', false => 'No'], $page->status, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control']) }}
                        @if($errors->has('status'))
                            <span class="invalid-feedback">
                                {{ $errors->first('status') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image') }}
                    {{ Form::text('image', $page->status, ['class' => $errors->has('image') ? 'form-control is-invalid' : 'form-control']) }}
                    @if($errors->has('image'))
                        <span class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <ul class="nav nav-tabs tabs-line">
                        @foreach ($language as $lang)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" href="#lang_{{ $lang->id }}" data-toggle="tab"><i class="fa fa-globe"></i> {{ $lang->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($language as $lang)
                        <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="lang_{{ $lang->id }}">
                            <div class="form-group">
                                {{ Form::label('title', 'Title '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[title]', $page_data[$lang->locale][0]->title, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('title'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('h1', 'H1 '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[h1]', $page_data[$lang->locale][0]->h1, ['class' => $errors->has('h1') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('h1'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('h1') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Description '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[description]', $page_data[$lang->locale][0]->description, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('description'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('meta_description', 'Meta description '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[meta_description]', $page_data[$lang->locale][0]->meta_description, ['class' => $errors->has('meta_description') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('meta_description'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('meta_description') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('meta_title', 'Meta title '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[meta_title]', $page_data[$lang->locale][0]->meta_title, ['class' => $errors->has('meta_title') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('meta_title'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('meta_title '.$lang->locale) }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('meta_keywords', 'Meta keywords '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[meta_keywords]', $page_data[$lang->locale][0]->meta_keywords, ['class' => $errors->has('meta_keywords') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('meta_keywords'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('meta_keywords') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('og_title', 'Og title '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[og_title]', $page_data[$lang->locale][0]->og_title, ['class' => $errors->has('og_title') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('og_title'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('og_title') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('og_description', 'Og description '.$lang->locale) }}
                                {{ Form::text($lang->locale.'[og_description]', $page_data[$lang->locale][0]->og_description, ['class' => $errors->has('og_description') ? 'form-control is-invalid' : 'form-control']) }}
                                @if($errors->has('og_description'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('og_description') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Save</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection