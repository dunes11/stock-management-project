@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-title">

            <h2> Show User</h2>
        </div>
        <div class="card-toolbar">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>


    <div class="card-body">

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>
                        <h3>Name</h3>
                    </th>
                    <td>
                        <h4>
                            {{ $user->name }}
                        </h4>
                    </td>
                </tr>
                <tr>
                    <th>
                        <h3>E-Mail</h3>
                    </th>
                    <td>
                        <h4>
                            {{ $user->email }}
                        </h4>
                    </td>
                </tr>
                <tr>
                    <th>
                        <h3>Mobile</h3>
                    </th>
                    <td>
                        <h4>
                            {{ $user->mobile }}
                        </h4>
                    </td>
                </tr>
                <tr>
                    <th>
                        <h3>Roles</h3>
                    </th>
                    <td>
                        @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                </tr>
            </table>
        </div>

    </div>
</div>
@endsection