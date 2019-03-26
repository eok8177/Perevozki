@extends('backend.layouts.admin')

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Categoties</div> <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add category</a>
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="50px"></th>
                        <th>Name</th>
                        <th>Parent name</th>
                        <th>Data add</th>
                        <th>Data mod</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            <label class="ui-checkbox">
                                <input type="checkbox">
                                <span class="input-span"></span>
                            </label>
                        </td>
                        <td>iphone case</td>
                        <td>$1200</td>
                        <td>33%</td>
                        <td>02/08/2017</td>
                        <td>02/08/2017</td>
                        <td>
                            <a class="btn btn-warning btn-circle" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-penci"></i></a>
                            <a  class="btn btn-warning btn-circle" href="{{ route('admin.categories.destroy', $category->id) }}"><i class="fa fa-trash"></i></a>
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