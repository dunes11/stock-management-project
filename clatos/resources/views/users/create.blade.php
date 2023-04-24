@extends('layouts.app')
@section('title',' | User Add')
@section('breadcrumb')
<!--begin::Item-->
<li class="breadcrumb-item text-gray-600">
    <a href="{{ route('users.index') }}" class="text-gray-600">Users</a> &nbsp;
</li>
<!--end::Item-->
<!--begin::Item-->
<li class="breadcrumb-item text-gray-600">
    Add &nbsp;</li>
<!--end::Item-->
@endsection


@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h2>Create New User</h2>

        </div>

        <div class="card-toolbar">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('users.store') }}" method="POST" class="form">
            @csrf
            <div class="row justify-content-center">
                <div class=" col-sm-12 col-lg-8 col-md-8 ">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 form-floating mb-7">
                            <input type="text" wire:model="post.name" value="{{ $post['name'] ?? '' }}" name="name" class="form-control  form-control-solid @error('post.name') is-invalid @enderror" id="floatingInputname" placeholder="Jhon Doe" />
                            <label for="floatingInputname " class="text-gray-600 required">Name</label>
                            @error('post.name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 form-floating mb-7">
                            <input type="text" wire:model="post.email" value="{{ $post['email'] ?? '' }}" name="email" class="form-control  form-control-solid @error('post.name') is-invalid @enderror" id="floatingInputemail" placeholder="name@example.com" />
                            <label for="floatingInputemail " class="text-gray-600 required">Email</label>
                            @error('post.email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 form-floating mb-7">
                            <input type="text" wire:model="post.mobile" value="{{ $post['mobile'] ?? '' }}" name="mobile" class="form-control  form-control-solid @error('post.mobile') is-invalid @enderror" id="floatingInputMobile" placeholder="9876543211" />
                            <label for="floatingInputMobile " class="text-gray-600 required">Mobile</label>
                            @error('post.mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 form-floating mb-7">
                            <input type="file" wire:model="post.profilePicture" name="profilePicture" class="form-control  form-control-solid @error('post.profilePicture') is-invalid @enderror" id="floatingInputprofilePicture" placeholder="" />
                            <label for="floatingInputprofilePicture " class="text-gray-600 required">Profile Picture</label>
                            @error('post.name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 form-floating mb-7">
                            <input type="password" wire:model="post.password" value="{{ $post['password'] ?? '' }}" name="password" class="form-control  form-control-solid @error('post.password') is-invalid @enderror" id="floatingInputpassword" placeholder="9876543211" />
                            <label for="floatingInputpassword " class="text-gray-600 required">Password</label>
                            @error('post.password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 form-floating mb-7">
                            <input type="password" wire:model="post.confirm_password" value="{{ $post['confirm_password'] ?? '' }}" name="confirm_password" class="form-control  form-control-solid @error('post.confirm_password') is-invalid @enderror" id="floatingInputconfirm_password" placeholder="9876543211" />
                            <label for="floatingInputconfirm_password " class="text-gray-600 required">Confirm
                                Password</label>
                            @error('post.confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 form-floating mb-7">
                            <select name="" id="floatingselect_reportsTo_id" class="form-control  from-select form-control-solid" name="reportsTo_id">
                                <option value="" disabled>User Reports To</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingselect_reportsTo_id " class="text-gray-600 required">User Reports To</label>
                            @error('post.role_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6 col-sm-12 mb-7">

                            <div class="d-flex justify-content-between form-control  form-control-solid form-check form-check-custom ">
                                <label class="form-check-label text-dark w-100" for="flexCheckDefaultAFLead">
                                    Available For Lead
                                </label>
                                <input class="form-check-input" type="checkbox" name="isAvailableForLead" value="1" id="flexCheckDefaultAFLead" checked />
                            </div>
                            @error('post.isAvailableForLead')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-7">
                            <div class="d-flex justify-content-between form-control  form-control-solid form-check form-check-custom ">
                                <label class="form-check-label text-dark w-100" for="flexCheckDefaultemailMasking">
                                    Mask Email
                                </label>
                                <input class="form-check-input" type="checkbox" name="emailMasking" value="1" id="flexCheckDefaultemailMasking" checked />
                            </div>
                            @error('post.emailMasking')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-7">

                            <select name="" id="" multiple class="form-control  from-select form-control-solid" name="roles[]">
                                <option value="" class="fs-3 fw-bold" disabled>Select Role</option>
                                @foreach ($roles as $role)
                                <option value="">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('post.role_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="row text-end">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<link href="assets/plugins/custom/bootstrap-select/bootstrap-select.bundle.css" rel="stylesheet" type="text/css" />
@endsection