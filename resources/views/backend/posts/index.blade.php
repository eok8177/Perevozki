@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Posts</div> <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Add post</a>
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
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td>{{ $post->translate($app_locale)->first()->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td><img style="max-width: 40px;" src="{{ $post->image }}" class="img-responsive" alt=""></td>
                        <td>{{ $post->created_at }} / {{ $post->updated_at }}</td>
                        <td> {!! $post->status ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-remove text-danger"></i>'!!}</td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.posts.edit', $post->id) }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-xs delete-item" href="{{ route('admin.posts.destroy', $post->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection