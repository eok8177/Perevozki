@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Roles</div> <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Add role</a>
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="50px">Id</th>
                        <th>Name</th>
                        <th>permissions</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>
                            {{ $role->id }}
                        </td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->permissions }}</td>
                        <td>{{ $role->created_at }} / {{ $role->updated_at }}</td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-xs delete-item" href="{{ route('admin.roles.destroy', $role->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div>
    </div>
@endsection