@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Lead &nbsp;</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Edit &nbsp;</li>
    <!--end::Item-->
@endsection

<div>
    <div class="card ">
        <div class="card-header">
            <div class="card-title fs-1">
                Edit Lead
            </div>
            <div class="card-toolbar">
                @if ($errors->any())
                    <div class="alert alert-danger d-grid position-sticky top-25 start-50">
                        @foreach ($errors->all() as $err)
                            <span>{{ $err }}</span>
                        @endforeach

                    </div>
                @endif
                <div>
                    <a href="{{ route('leads') }}" class="btn btn-primary">Leads</a>
                </div>
            </div>
        </div>
        <div class="card-body h-500px overflow-auto">
            <div class="row justify-content-center">
                <div class=" col-sm-12 col-lg-8 col-md-8 ">
                    <form wire:submit.prevent="leadUpdate({{ $post['id'] }})">
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="text" wire:model="post.name" value="{{ $post['name'] ?? '' }}"
                                    name="name"
                                    class="form-control  form-control-solid @error('post.name') is-invalid @enderror"
                                    id="floatingInputname" placeholder="name@example.com" />
                                <label for="floatingInputname " class="ps-10 required">Name</label>
                                @error('post.name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="text" wire:model="post.companyName"
                                    value="{{ $post['companyName'] ?? '' }}" name="companyName"
                                    class="form-control  form-control-solid @error('post.companyName') is-invalid @enderror"
                                    id="floatingInputCname" placeholder="Company Name" />
                                <label for="floatingInputCname " class="ps-10 ">Company Name</label>
                                @error('post.companyName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="text" value="{{ $post['mobile'] }}" name="mobile" readonly
                                    class="form-control  form-control-solid @error('post.mobile') is-invalid @enderror"
                                    id="floatingInputMobile" placeholder="Mobile" />
                                <label for="floatingInputMobile " class="ps-10 required">Mobile</label>
                                @error('post.mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="email" wire:model="post.email" value="{{ $post['email'] }}"
                                    name="email"
                                    class="form-control  form-control-solid @error('post.email') is-invalid @enderror"
                                    id="floatingInputEmail" placeholder="Email here..." />
                                <label for="floatingInputEmail " class="ps-10 ">Email address</label>
                                @error('post.email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="form-floating mb-7">
                            <input type="text" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$"
                                wire:model="post.gst" value="{{ $post['gst'] ?? '' }}" name="gst"
                                class="form-control  form-control-solid @error('post.gst') is-invalid @enderror"
                                id="floatingInputgst" placeholder="GST" />
                            <label for="floatingInputgst " class="ps-8 ps-auto">GST </label>
                            @error('post.gst')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="text" wire:model="post.city" value="{{ $post['city'] ?? '' }}"
                                    name="city"
                                    class="form-control  form-control-solid @error('post.city') is-invalid @enderror"
                                    id="floatingInputCity" placeholder="City" />
                                <label for="floatingInputCity " class="ps-10 ">City</label>
                                @error('post.city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="text" wire:model="post.pincode" value="{{ $post['pincode'] ?? '' }}"
                                    name="pincode"
                                    class="form-control  form-control-solid @error('post.pincode') is-invalid @enderror"
                                    id="floatingInputPincode" placeholder="Pincode" />
                                <label for="floatingInputPincode " class="ps-10 ">Pincode</label>
                                @error('post.pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="text" wire:model="post.state" value="{{ $post['state'] ?? '' }}"
                                    name="state"
                                    class="form-control  form-control-solid @error('post.state') is-invalid @enderror"
                                    id="floatingInputstate" placeholder="State" />
                                <label for="floatingInputstate " class="ps-10 ">State</label>
                                @error('post.state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-sm-12 form-floating mb-7">
                                <input type="text" wire:model="post.country" value="{{ $post['country'] ?? '' }}"
                                    name="country"
                                    class="form-control  form-control-solid @error('post.country') is-invalid @enderror"
                                    id="floatingInputCountry" placeholder="Country" />
                                <label for="floatingInputCountry " class="ps-10 ">Country</label>
                                @error('post.country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--begin::Input group-->
                        <div class="form-floating mb-7">
                            <input type="text" wire:model="post.remarks" value="{{ $post['remarks'] ?? '' }}"
                                name="remark"
                                class="form-control  form-control-solid @error('post.remark')is-invalid @enderror"
                                id="floatingInputPrice" placeholder="Remarks" />
                            <label for="floatingInputPrice " class="ps-8 ps-auto ">Remarks</label>
                            @error('post.remark')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!--begin::Input group-->
                        <div class=" row row-cols-4 mb-7 h-125px overflow-auto h-lg-100 ">
                            <div class="col-12 fs-1 fw-bold">
                                Interested In</div>
                            {{-- {{ var_export($interestedIn) }} --}}
                            @foreach ($leadFor as $item)
                                <div
                                    class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom form-check-solid">
                                    <input class="form-check-input" wire:model="interestedIn" type="checkbox"
                                        @if ($interestedIn[$item->id] ?? '' == $item->id) {{ 'checked' }} @endif
                                        value="{{ $item->id }}" id="flexRadioDefault{{ $item->name }}" />
                                    <label class="form-check-label w-100" for="flexRadioDefault{{ $item->name }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Input group-->
                        <!--begin::select group-->
                        <div class="row mb-7 d-sm-block d-lg-none  ">
                            <select
                                class="form-select  form-select-solid @error('post.lead_source_id') is-invalid @enderror"
                                wire:model="post.lead_source_id" name="lead_source_id" aria-label="Select ">
                                <option> Lead Source</option>
                                @foreach ($leadSource as $item)
                                    <option @if ($post['lead_source_id'] ?? '' == $item->id) {{ 'selected' }} @endif
                                        value="{{ $item->id }}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::select group-->
                        <!--begin::Input group-->
                        <div class="row row-cols-4 mb-7 d-lg-inline-flex d-none">
                            <div class="col-12 fs-1 fw-bold">
                                Lead Source
                            </div>
                            @foreach ($leadSource as $item)
                                <div
                                    class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom form-check-solid">
                                    <input class="form-check-input" wire:model="post.lead_source_id"
                                        name="lead_source_id" type="radio"
                                        @if ($post['assignedTo_id'] ?? '' == $item->id) {{ 'checked' }} 
                                        @elseif ($loop->first) {{ 'checked' }} @endif
                                        value="{{ $item->id }}" id="flexRadioDefault2{{ $item->id }}" />
                                    <label class="form-check-label w-100" for="flexRadioDefault2{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Input group-->
                        <!--begin::select group-->
                        <div class="row mb-7 d-sm-block d-lg-none ">
                            <select
                                class="form-select  form-select-solid @error('post.assignedTo_id') is-invalid @enderror"
                                wire:model="post.assignedTo_id" name="assignedTo_id" aria-label="Select ">
                                <option>Account Manager</option>
                                @foreach ($accManagers as $item)
                                    <option @if ($post['assignedTo_id'] ?? '' == $item->id) {{ 'selected' }} @endif
                                        value="{{ $item->id }}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::select group-->
                        @error('post.assignedTo_id')
                            <div class="row">
                                <small class="text-danger w-100">{{ $message }}</small>
                            </div>
                        @enderror
                        <!--begin::Input group-->
                        <div class="row row-cols-4 mb-7 d-lg-inline-flex d-none ">
                            <div class="col-12 fs-1 fw-bold">
                                Account Manager
                            </div>
                            @foreach ($accManagers as $item)
                                <div
                                    class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom form-check-solid">
                                    <input class="form-check-input" wire:model="post.assignedTo_id"
                                        name="assignedTo_id" type="radio"
                                        @if ($post['assignedTo_id'] ?? '' == $item->id) {{ 'checked' }} @endif
                                        @if ($loop->first) {{ 'checked' }} @endif
                                        value="{{ $item->id }}" id="flexRadioDefault3{{ $item->id }}" />
                                    <label class="form-check-label w-100" for="flexRadioDefault3{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row row-cols-4 mb-7 d-lg-inline-flex d-none ">
                            <div class="col-12 fs-1 fw-bold">
                                Lead Status
                            </div>
                            @foreach ($leadStatus as $item)
                                <div
                                    class="col-lg-4 col-sm-6 col-12 form-check p-3 form-check-custom form-check-solid">
                                    <input class="form-check-input" wire:model="post.lead_status_id"
                                        name="lead_status_id" type="radio"
                                        @if ($post['lead_status_id'] ?? '' == $item->id) {{ 'checked' }} 
                                        @elseif ($loop->first) {{ 'checked' }} @endif
                                        value="{{ $item->id }}" id="flexRadioDefault4{{ $item->id }}" />
                                    <label class="form-check-label w-100" for="flexRadioDefault4{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Input group-->
                        <div class="row text-end mb-7">
                            <div class="col">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('title', '| Lead Add')
