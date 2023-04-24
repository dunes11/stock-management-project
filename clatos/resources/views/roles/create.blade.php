@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h2>Create New Role</h2>
        </div>
        <div class="card-toolbar">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
    <div class="card-body  ">
        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-3 ">
                <div class="row w-100">
                    <h2> Name</h2>
                </div>

                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}

            </div>
            <div class="col-8">
                <div class=" row row-cols-2  row-cols-md-3  row-cols-lg-4  ">
                    <div class="row w-100 ">
                        <h2> Permission</h2>
                    </div>
                    @foreach ($permission as $value)
                    <div class="col p-3 ">
                        <label class=" form-check ">
                            {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name form-check-input ']) }}
                            {{ $value->name }}
                        </label>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-1 row">
                <div class="col text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection