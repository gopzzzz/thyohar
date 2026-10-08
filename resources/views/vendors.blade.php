@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">



    <!-- =========================================================
         VENDOR PAGE
         ========================================================= -->

    <div class="vendor-page">


        <!-- =====================================================
             PAGE HEADER
             ===================================================== -->

        


        <!-- =====================================================
             MAIN CONTENT
             ===================================================== -->

    <section class="content">

            <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">


                        <!-- =================================================
                             CARD HEADER
                             ================================================= -->

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h3 class="card-title">
                                Vendor List
                            </h3>


                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newVendorModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Vendor

                            </button>

                        </div>


                        <!-- =================================================
                             SUCCESS MESSAGE
                             ================================================= -->

                        @if(session('success'))

                            <div class="alert alert-success alert-dismissible fade show m-3">

                                {{ session('success') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >

                                    <span>&times;</span>

                                </button>

                            </div>

                        @endif


                        <!-- =================================================
                             ERROR MESSAGE
                             ================================================= -->

                        @if(session('error'))

                            <div class="alert alert-danger alert-dismissible fade show m-3">

                                {{ session('error') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >

                                    <span>&times;</span>

                                </button>

                            </div>

                        @endif


                        <!-- =================================================
                             VALIDATION ERRORS
                             ================================================= -->

                        @if($errors->any())

                            <div class="alert alert-danger m-3">

                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <!-- =================================================
                             VENDOR TABLE
                             ================================================= -->

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">

                                    <thead>

                                        <tr>

                                            <th style="width:60px;">
                                                #
                                            </th>

                                            <th>
                                                Vendor
                                            </th>

                                            <th>
                                                Contact
                                            </th>

                                            <th>
                                                Email
                                            </th>

                                            <th>
                                                Address
                                            </th>

                                            <th>
                                                Categories
                                            </th>

                                            <th>
                                                Bio
                                            </th>

                                            <th style="width:120px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>

                            <thead>

                                    <tbody>

                                        @forelse($vendors->sortBy('id')->values() as $vendor)

                                            @php

                                                $vendorCategoryIds = DB::table('vendor_services')
                                                    ->where('vendor_id', $vendor->id)
                                                    ->pluck('service_id')
                                                    ->toArray();

                                                $vendorCategories = $categories
                                                    ->whereIn('id', $vendorCategoryIds);

                                            @endphp


                                            <tr>


                                                <!-- NUMBER -->

                                                <td>

                                                    {{ $loop->iteration }}

                                                </td>


                                                <!-- VENDOR -->

                                                <td>

                                                    <div class="d-flex align-items-center">

                                                        @if($vendor->logo)

                                                            <img
                                                                src="{{ asset($vendor->logo) }}"
                                                                alt="{{ $vendor->vendor_name }}"
                                                                style="
                                                                    width:40px;
                                                                    height:40px;
                                                                    object-fit:cover;
                                                                    border-radius:6px;
                                                                    margin-right:10px;
                                                                "
                                                            >

                                                        @else

                                                            <i
                                                                class="fas fa-store mr-2"
                                                                style="font-size:20px;"
                                                            ></i>

                                                        @endif


                                                        <div>

                                                            <strong>
                                                                {{ $vendor->vendor_name }}
                                                            </strong>

                                                            <br>

                                                            <small class="text-muted">
                                                                Vendor #{{ $vendor->id }}
                                                            </small>

                                                        </div>

                                                    </div>

                                                </td>


                                                <!-- CONTACT -->

                                                <td>

                                                    <i class="fas fa-phone-alt mr-1"></i>

                                                    {{ $vendor->phone_number }}

                                                </td>


                                                <!-- EMAIL -->

                                                <td>

                                                    <i class="far fa-envelope mr-1"></i>

                                                    {{ $vendor->mail_id }}

                                                </td>


                                                <!-- ADDRESS -->

                                                <td>

                                                    {{ $vendor->address }}

                                                </td>


                                                <!-- CATEGORIES -->

                                                <td>

                                                    @forelse($vendorCategories as $category)

                                                        <span class="badge badge-primary mr-1">

                                                            {{ $category->category_name }}

                                                        </span>

                                                    @empty

                                                        <span class="text-muted">

                                                            No categories

                                                        </span>

                                                    @endforelse

                                                </td>


                                                <!-- BIO -->

                                                <td>

                                                    {{ \Illuminate\Support\Str::limit($vendor->bio, 70) }}

                                                </td>


                                                <!-- ACTION -->

                                                <td class="text-center">

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editVendorModal{{ $vendor->id }}"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                    </button>

                                                </td>

                                            </tr>


                                            <!-- =================================================
                                                 EDIT VENDOR MODAL
                                                 ================================================= -->

                                            <div
                                                class="modal fade"
                                                id="editVendorModal{{ $vendor->id }}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="editVendorModalLabel{{ $vendor->id }}"
                                                aria-hidden="true"
                                            >

                                                <div
                                                    class="modal-dialog modal-lg"
                                                    role="document"
                                                >

                                                    <form
                                                        action="{{ route('vendors.update', $vendor->id) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >

                                                        @csrf

                                                        @method('PUT')


                                                        <div class="modal-content">


                                                            <!-- MODAL HEADER -->

                                                            <div class="modal-header">

                                                                <h5
                                                                    class="modal-title"
                                                                    id="editVendorModalLabel{{ $vendor->id }}"
                                                                >

                                                                    <i class="fas fa-edit"></i>

                                                                    Edit Vendor

                                                                </h5>


                                                                <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                >

                                                                    <span>&times;</span>

                                                                </button>

                                                            </div>


                                                            <!-- MODAL BODY -->

                                                            <div class="modal-body">


                                                                <!-- VENDOR NAME -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Vendor Name

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <input
                                                                        type="text"
                                                                        name="vendor_name"
                                                                        class="form-control"
                                                                        value="{{ $vendor->vendor_name }}"
                                                                        placeholder="Enter vendor name"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- PHONE -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Phone Number

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <input
                                                                        type="text"
                                                                        name="phone_number"
                                                                        class="form-control"
                                                                        value="{{ $vendor->phone_number }}"
                                                                        maxlength="10"
                                                                        minlength="10"
                                                                        pattern="[0-9]{10}"
                                                                        inputmode="numeric"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- EMAIL -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Mail ID

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <input
                                                                        type="email"
                                                                        name="mail_id"
                                                                        class="form-control"
                                                                        value="{{ $vendor->mail_id }}"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- CATEGORIES -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Categories

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <div
                                                                        style="
                                                                            border:1px solid #ced4da;
                                                                            border-radius:.25rem;
                                                                            padding:10px;
                                                                            max-height:200px;
                                                                            overflow-y:auto;
                                                                        "
                                                                    >

                                                                        @forelse($categories as $category)

                                                                            <div class="custom-control custom-checkbox">

                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="edit_category_{{ $vendor->id }}_{{ $category->id }}"
                                                                                    name="categories[]"
                                                                                    value="{{ $category->id }}"
                                                                                    {{ in_array($category->id, $vendorCategoryIds) ? 'checked' : '' }}
                                                                                >

                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="edit_category_{{ $vendor->id }}_{{ $category->id }}"
                                                                                >

                                                                                    {{ $category->category_name }}

                                                                                </label>

                                                                            </div>

                                                                        @empty

                                                                            <span class="text-muted">

                                                                                No categories available.

                                                                            </span>

                                                                        @endforelse

                                                                    </div>

                                                                </div>


                                                                <!-- ADDRESS -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Address

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <textarea
                                                                        name="address"
                                                                        class="form-control"
                                                                        rows="3"
                                                                        required
                                                                    >{{ $vendor->address }}</textarea>

                                                                </div>


                                                                <!-- BIO -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Bio

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <textarea
                                                                        name="bio"
                                                                        class="form-control"
                                                                        rows="4"
                                                                        required
                                                                    >{{ $vendor->bio }}</textarea>

                                                                </div>


                                                                <!-- CURRENT LOGO -->

                                                                @if($vendor->logo)

                                                                    <div class="form-group">

                                                                        <label>
                                                                            Current Logo
                                                                        </label>

                                                                        <br>

                                                                        <img
                                                                            src="{{ asset($vendor->logo) }}"
                                                                            alt="{{ $vendor->vendor_name }}"
                                                                            style="
                                                                                width:80px;
                                                                                height:80px;
                                                                                object-fit:cover;
                                                                                border-radius:6px;
                                                                            "
                                                                        >

                                                                    </div>

                                                                @endif


                                                                <!-- NEW LOGO -->

                                                                <div class="form-group">

                                                                    <label>
                                                                        Change Logo
                                                                    </label>

                                                                    <input
                                                                        type="file"
                                                                        name="logo"
                                                                        class="form-control"
                                                                        accept=".jpg,.jpeg,.png,.webp"
                                                                    >

                                                                    <small class="text-muted">

                                                                        Leave empty to keep the current logo.

                                                                    </small>

                                                                </div>

                                                            </div>


                                                            <!-- MODAL FOOTER -->

                                                            <div class="modal-footer">

                                                                <button
                                                                    type="button"
                                                                    class="btn btn-secondary"
                                                                    data-dismiss="modal"
                                                                >

                                                                    Close

                                                                </button>


                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                >

                                                                    <i class="fas fa-save"></i>

                                                                    Update Vendor

                                                                </button>

                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>


                                        @empty

                                            <tr>

                                                <td
                                                    colspan="8"
                                                    class="text-center text-muted"
                                                >

                                                    No vendors found.

                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>


                        <!-- =================================================
                             CARD FOOTER
                             ================================================= -->

                        <div class="card-footer clearfix">

                            <span class="text-muted">

                                Total Vendors:

                                {{ $vendors->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- =========================================================
     ADD NEW VENDOR MODAL
     ========================================================= -->

<div
    class="modal fade"
    id="newVendorModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newVendorModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >

        <form
            action="{{ route('vendors.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="modal-content">


                <!-- MODAL HEADER -->

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="newVendorModalLabel"
                    >

                        <i class="fas fa-store"></i>

                        Add New Vendor

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>&times;</span>

                    </button>

                </div>


                <!-- MODAL BODY -->

                <div class="modal-body">


                    <!-- VENDOR NAME -->

                    <div class="form-group">

                        <label>

                            Vendor Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            name="vendor_name"
                            class="form-control"
                            value="{{ old('vendor_name') }}"
                            placeholder="Enter vendor name"
                            required
                        >

                    </div>


                    <!-- PHONE -->

                    <div class="form-group">

                        <label>

                            Phone Number

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            name="phone_number"
                            class="form-control"
                            value="{{ old('phone_number') }}"
                            placeholder="10 digit phone number"
                            maxlength="10"
                            minlength="10"
                            pattern="[0-9]{10}"
                            inputmode="numeric"
                            required
                        >

                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label>

                            Mail ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <input
                            type="email"
                            name="mail_id"
                            class="form-control"
                            value="{{ old('mail_id') }}"
                            placeholder="vendor@example.com"
                            required
                        >

                    </div>


                    <!-- CATEGORIES -->

                    <div class="form-group">

                        <label>

                            Categories

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <div
                            style="
                                border:1px solid #ced4da;
                                border-radius:.25rem;
                                padding:10px;
                                max-height:200px;
                                overflow-y:auto;
                            "
                        >

                            @forelse($categories as $category)

                                <div class="custom-control custom-checkbox">

                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="new_category_{{ $category->id }}"
                                        name="categories[]"
                                        value="{{ $category->id }}"
                                    >

                                    <label
                                        class="custom-control-label"
                                        for="new_category_{{ $category->id }}"
                                    >

                                        {{ $category->category_name }}

                                    </label>

                                </div>

                            @empty

                                <span class="text-muted">

                                    No categories available.

                                </span>

                            @endforelse

                        </div>

                    </div>


                    <!-- ADDRESS -->

                    <div class="form-group">

                        <label>

                            Address

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                            placeholder="Enter complete vendor address"
                            required
                        >{{ old('address') }}</textarea>

                    </div>


                    <!-- BIO -->

                    <div class="form-group">

                        <label>

                            Bio

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <textarea
                            name="bio"
                            class="form-control"
                            rows="4"
                            placeholder="Write a short description about this vendor"
                            required
                        >{{ old('bio') }}</textarea>

                    </div>


                    <!-- LOGO -->

                    <div class="form-group">

                        <label>
                            Upload Logo
                        </label>

                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="text-muted">

                            JPG, JPEG, PNG or WEBP. Maximum 2 MB.

                        </small>

                    </div>

                </div>


                <!-- MODAL FOOTER -->

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >

                        Close

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="fas fa-save"></i>

                        Save Vendor

                    </button>

                </div>

            </div>

        </section>

    </div>

</div>

@endsection