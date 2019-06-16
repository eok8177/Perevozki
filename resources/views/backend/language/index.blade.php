@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Language</div> <a href="{{ route('admin.language.create') }}" class="btn btn-success">Add lang</a>
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="50px">Id</th>
                        <th>Name</th>
                        <th>Locale</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($language as $lang)
                    <tr>
                        <td>
                            {{ $lang->id }}
                        </td>
                        <td>{{ $lang->name }}</td>
                        <td>{{ $lang->locale }}</td>
                        <td>{{ $lang->created_at }} / {{ $lang->updated_at }}</td>
                        <td> {!! $lang->status ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-remove text-danger"></i>'!!}</td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.language.edit', $lang->id) }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-xs delete-item" href="{{ route('admin.language.destroy', $lang->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $language->links() }}
            </div>
        </div>
    </div>
@endsection