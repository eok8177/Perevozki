@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Reviews</div> <a href="{{ route('admin.reviews.create') }}" class="btn btn-success">Add review</a>
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="50px">Id</th>
                        <th>Name</th>
                        <th>Text</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td>
                            {{ $review->id }}
                        </td>
                        <td>{{ $review->title }}</td>
                        <td>{!! $review->text !!}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->created_at }} / {{ $review->updated_at }}</td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.reviews.status', $review->id) }}">{!! $review->status ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-remove text-danger"></i>'!!}</a>
                            </td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.reviews.edit', $review->id) }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-xs delete-item" href="{{ route('admin.reviews.destroy', $review->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
@endsection