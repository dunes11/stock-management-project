@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h2>Role Management</h2>
        </div>
        <div class="card-toolbar">
            {{-- @can('role-create') --}}
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            {{-- @endcan --}}
        </div>
    </div>
    <div class="card-body">
        <table class="table fs-5 table-hover table-row-bordered">
            <thead>

                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                        {{-- @can('role-edit') --}}
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                        {{-- @endcan
                        @can('role-delete') --}}
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        {{-- @endcan --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {!! $roles->render() !!}
    </div>
</div>
@endsection