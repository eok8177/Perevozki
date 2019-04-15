@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Pages</div>
            @if($type != 'statics')
            <a href="{{ route('admin.pages.create', $type) }}" class="btn btn-success">Add page</a>
            @endif
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="50px">Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>
                            {{ $page->id }}
                        </td>
                        <td>{{ $page->translate($app_locale)->first()->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td><img style="max-width: 40px;" src="{{ $page->image }}" class="img-responsive" alt=""></td>
                        <td>{{ $page->created_at }} / {{ $page->updated_at }}</td>
                        <td> {!! $page->status ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-remove text-danger"></i>'!!}</td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.pages.edit', $page->id) }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-xs delete-item" href="{{ route('admin.pages.delete', $page->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $pages->links() }}
            </div>
        </div>
    </div>
@endsection