@extends('livewire.lead.layout')
@section('breadcrumb')
    <li class="breadcrumb-item text-gray-600">
        Lead &nbsp;</li>
    <li class="breadcrumb-item text-gray-600">
        Address &nbsp;</li>
    <li class="breadcrumb-item text-gray-600">
        Edit</li>
@endsection

@section('lead-content')
        
    <form class="form " action="{{ route('lead.address.update') }}" method="POST" id="kt_modal_new_address_form" 
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="address_id" value="{{ Crypt::encrypt($address->id) }}">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h1>
                        Address update
                    </h1>
                </div>
                <div class="card-toolbar">
                    <span class="badge badge-light-info"> {{ $address->lead->name }} </span>
                    <span class="badge badge-light-primary"> {{ $address->lead->id }} </span>

                </div>
            </div>
            <div class="card-body mx-lg-19">
                <div class="mb-6">

                    <div class="form-floating mb-3">
                        <input id="u_name" type="text" class="form-control" name="name" required
                            value="{{ old('name') ?? $address->name }}" />
                        <label for="u_name" class="required fw-bolder text-gray-600">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="u_mobile" type="text" class="form-control" name="mobile" required
                            value="{{ old('mobile') ?? $address->mobile }}" />
                        <label for="u_mobile" class="required fw-bolder text-gray-600">Mobile</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="u_email" type="email" class="form-control" name="email" 
                            value="{{ old('email') ?? $address->email }}" />
                        <label for="u_email" class=" fw-bolder text-gray-600">E-Mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="companyName" type="text" placeholder="Enter E-Mail" class="form-control"
                            value="{{ old('companyName', $address->companyName) }}" name="companyName" required />
                        <label for="companyName" class="required fw-bolder text-gray-600">Company Name </label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea id="address" class="form-control" rows="2" name="address" placeholder="Address" required
                            data-kt-autosize="true">{{ old('address') ?? ($address->address ?? '') }}</textarea>
                        <label for="address" class="fs-6 fw-bold mb-2 fw-bolder text-gray-600 required">Billing
                            Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="pin_no" class="form-control" name="pincode"
                            value="{{ old('pincode') ?? ($address->pincode ?? '') }}" placeholder="pincode" required />
                        <label for="pin_no" class="required form-label fw-bolder text-gray-600">PIN/ZIP
                            Code</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="city" class="form-control" name="city"
                            value="{{ old('city') ?? ($address->city ?? '') }}" placeholder="city" required />
                        <label for="city" class="required form-label fw-bolder text-gray-600">City</label>
                    </div>
                    <!-- </div> -->
                    <div class="d-flex flex-column flex-md-row gap-5">
                        <div class="fv-row mb-5 w-50">

                            <div class="form-floating mb-3">
                                <input id="state" class="form-control" name="state"
                                    value="{{ old('state') ?? ($address->state ?? '') }}" placeholder="State" required />

                                <label for="state" class="fw-bolder text-gray-600 required"> State</label>
                            </div>
                        </div>
                        <div class=" w-50 mb-5  ">

                            <select class=" form-select form-select-lg" data-placeholder="Select an option" name="country"
                                required>
                                <option>Select a country</option>
                                @foreach ($country as $val)
                                    <option @if ($val->name == old('country') || $val->name == $address->country) {{ 'selected' }} @endif
                                        value="{{ $val->name }}">{{ $val->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-floating mb-3">

                        <input id="gst" type="text" class="form-control" minlength="15" maxlength="15"
                            placeholder="GST No." value="{{ $address->gst ?? '' }}" value="{{ old('gst') }}"
                            name="gst" title="GST Format {11BBBBB0000B1Z5}"
                            pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" />
                        <label class=" fw-bolder text-gray-600" for="gst">GST No.</label>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="p-3 rounded border-gray-300  border">
                    <label class="form-check form-switch form-check-custom form-check-solid ">
                        <input class="form-check-input" type="checkbox" value="1" name="isPrimary" checked
                            {{ $address->isPrimary ? 'checked' : '' }} />
                        <span class="form-check-label text-capitalize fw-bolder ">
                            Make This Adress Default
                        </span>
                    </label>
                </div>

            </div>
            <div class=" card-footer text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </div>
    </form>
@endsection()
