@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Categories</div> <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add category</a>
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
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>{{ $category->translate($app_locale)->first()->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td><img style="max-width: 40px;" src="{{ $category->image }}" class="img-responsive" alt=""></td>
                        <td>{{ $category->created_at }} / {{ $category->updated_at }}</td>
                        <td> {!! $category->status ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-remove text-danger"></i>'!!}</td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-xs delete-item" href="{{ route('admin.categories.destroy', $category->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection