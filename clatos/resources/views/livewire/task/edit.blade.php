@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Task All &nbsp;</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Edit &nbsp;</li>
    <!--end::Item-->
@endsection
@php
    // dd($post['id']);
@endphp
<div>
    <div class="card ">
        <div class="card-header">
            <div class="card-title fs-1">
                Task All Edit
            </div>
            <div class="card-toolbar">
                <div>
                    <a href="{{ route('task.all') }}" class="btn btn-primary">Tasks</a>
                </div>
            </div>
        </div>

        <div class="card-body h-500px overflow-auto">
            <div class="row justify-content-center">
                <div class=" col-sm-12 col-lg-10 col-md-8 m-10 ">
                    <form wire:submit.prevent="TaskFormEdit({{ $post['id'] }})">
                        <!--Begin::id-->
                        <div class="row">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="col-12 fs-1 fw-bold required">id</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="post.id" value="{{ $post['id'] ?? '' }}"
                                    name="id" class="form-control  form-control-solid" placeholder="id" readonly>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--End::id-->

                        <!--Begin::Title-->
                        <div class="row">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="col-12 fs-1 fw-bold required">Title</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" wire:model.defer="post.title" value="{{ $post['title'] ?? '' }}"
                                    name="title" class="form-control  form-control-solid" placeholder="Title"
                                    required>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--End::Title-->

                        <!--Begin::Details-->
                        <div class="row">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="col-12 fs-1 fw-bold">Details</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <textarea class="form-control form-control-solid" wire:model.defer="post.details" name="Details" name="details"
                                    value="{{ $post['details'] ?? '' }}"></textarea>
                                <!--end::Input-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <div class=" row row-cols-4 mb-7 d-lg-inline-flex ">
                            <div class="col-12 fs-1 fw-bold required">Account Manger </div>
                            @foreach ($assignedToData as $assignedTo_Data)
                                <div class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom ">
                                    <input class="form-check-input" wire:model.defer="post.assignedTo_id"
                                        name="assignedTo_id" type="radio" value="{{ $assignedTo_Data->id }}"
                                        id="flexRadioDefault{{ $assignedTo_Data->id }}" />
                                    <label class="form-check-label w-100">
                                        {{ $assignedTo_Data->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('post.assignedTo_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::AccountManager_id-->
                </div>
                <div class="row text-end mb-7">
                    <div class="col">
                        <button class="btn btn-primary">Edit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
