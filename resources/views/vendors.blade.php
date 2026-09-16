@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- ===================================================== -->
    <!-- CONTENT HEADER -->
    <!-- ===================================================== -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Vendors</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Vendors
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">


                        <!-- ================================================= -->
                        <!-- CARD HEADER -->
                        <!-- ================================================= -->

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h3 class="card-title">
                                Vendor List
                            </h3>


                            <!-- NEW VENDOR BUTTON -->

                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newVendorModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Record

                            </button>

                        </div>



                        <!-- ================================================= -->
                        <!-- SUCCESS MESSAGE -->
                        <!-- ================================================= -->

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



                        <!-- ================================================= -->
                        <!-- ERROR MESSAGE -->
                        <!-- ================================================= -->

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



                        <!-- ================================================= -->
                        <!-- VALIDATION ERRORS -->
                        <!-- ================================================= -->

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



                        <!-- ================================================= -->
                        <!-- VENDOR TABLE -->
                        <!-- ================================================= -->

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">

                                    <thead>

                                        <tr>

                                            <th style="width: 60px;">
                                                #
                                            </th>

                                            <th style="width: 100px;">
                                                Logo
                                            </th>

                                            <th>
                                                Vendor Name
                                            </th>

                                            <th>
                                                Phone Number
                                            </th>

                                            <th>
                                                Mail ID
                                            </th>

                                            <th>
                                                Address
                                            </th>

                                            <th>
                                                Bio
                                            </th>

                                            <th style="width: 100px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>



                                    <tbody>

                                        @php
                                            $i = 1;
                                        @endphp


                                        @forelse($vendors as $vendor)


                                            <tr>


                                                <!-- ================================= -->
                                                <!-- DISPLAY NUMBER -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $i }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- LOGO -->
                                                <!-- ================================= -->

                                                <td class="text-center">

                                                    @if($vendor->logo)

                                                        <img
                                                            src="{{ asset($vendor->logo) }}"
                                                            width="60"
                                                            height="60"
                                                            style="object-fit: contain;"
                                                            class="border rounded"
                                                            alt="Vendor Logo"
                                                        >

                                                    @else

                                                        <span class="text-muted">
                                                            No Logo
                                                        </span>

                                                    @endif

                                                </td>



                                                <!-- ================================= -->
                                                <!-- VENDOR NAME -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendor->vendor_name }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- PHONE NUMBER -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendor->phone_number }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- MAIL -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendor->mail_id }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- ADDRESS -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendor->address }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- BIO -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendor->bio }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- ACTION -->
                                                <!-- ================================= -->

                                                <td class="text-center">

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editVendorModal{{ $vendor->id }}"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                        Edit

                                                    </button>

                                                </td>


                                            </tr>



                                            <!-- ================================================= -->
                                            <!-- EDIT VENDOR MODAL -->
                                            <!-- ================================================= -->

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


                                                            <!-- ========================================= -->
                                                            <!-- EDIT MODAL HEADER -->
                                                            <!-- ========================================= -->

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



                                                            <!-- ========================================= -->
                                                            <!-- EDIT MODAL BODY -->
                                                            <!-- ========================================= -->

                                                            <div class="modal-body">


                                                                <!-- Vendor Name -->

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



                                                                <!-- Phone Number -->

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
                                                                        placeholder="Enter 10 digit phone number"
                                                                        maxlength="10"
                                                                        minlength="10"
                                                                        pattern="[0-9]{10}"
                                                                        inputmode="numeric"
                                                                        required
                                                                    >


                                                                    <small class="text-muted">

                                                                        Phone number must be exactly
                                                                        10 digits.

                                                                    </small>

                                                                </div>



                                                                <!-- Mail ID -->

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
                                                                        placeholder="Enter email address"
                                                                        required
                                                                    >

                                                                </div>



                                                                <!-- Address -->

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
                                                                        placeholder="Enter vendor address"
                                                                        required
                                                                    >{{ $vendor->address }}</textarea>

                                                                </div>



                                                                <!-- Bio -->

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
                                                                        rows="3"
                                                                        placeholder="Enter vendor bio"
                                                                        required
                                                                    >{{ $vendor->bio }}</textarea>

                                                                </div>



                                                                <!-- Current Logo -->

                                                                @if($vendor->logo)

                                                                    <div class="form-group">

                                                                        <label>
                                                                            Current Logo
                                                                        </label>


                                                                        <div>

                                                                            <img
                                                                                src="{{ asset($vendor->logo) }}"
                                                                                width="100"
                                                                                height="100"
                                                                                style="object-fit: contain;"
                                                                                class="border rounded"
                                                                                alt="Current Logo"
                                                                            >

                                                                        </div>

                                                                    </div>

                                                                @endif



                                                                <!-- Change Logo -->

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

                                                                        Allowed:
                                                                        JPG, JPEG, PNG, WEBP.

                                                                        Maximum 2 MB.

                                                                    </small>

                                                                </div>


                                                            </div>



                                                            <!-- ========================================= -->
                                                            <!-- EDIT MODAL FOOTER -->
                                                            <!-- ========================================= -->

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

                                                                    Update Record

                                                                </button>


                                                            </div>


                                                        </div>


                                                    </form>


                                                </div>

                                            </div>


                                            @php
                                                $i++;
                                            @endphp


                                        @empty


                                            <!-- ================================= -->
                                            <!-- NO VENDORS -->
                                            <!-- ================================= -->

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



                        <!-- ================================================= -->
                        <!-- CARD FOOTER -->
                        <!-- ================================================= -->

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



<!-- ========================================================= -->
<!-- ADD NEW VENDOR MODAL -->
<!-- ========================================================= -->

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


                <!-- ================================================= -->
                <!-- MODAL HEADER -->
                <!-- ================================================= -->

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="newVendorModalLabel"
                    >

                        <i class="fas fa-user-plus"></i>

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



                <!-- ================================================= -->
                <!-- MODAL BODY -->
                <!-- ================================================= -->

                <div class="modal-body">


                    <!-- Vendor Name -->

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



                    <!-- Phone Number -->

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
                            placeholder="Enter 10 digit phone number"
                            maxlength="10"
                            minlength="10"
                            pattern="[0-9]{10}"
                            inputmode="numeric"
                            required
                        >


                        <small class="text-muted">

                            Phone number must be exactly
                            10 digits.

                        </small>

                    </div>



                    <!-- Mail ID -->

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
                            placeholder="Enter email address"
                            required
                        >

                    </div>



                    <!-- Address -->

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
                            placeholder="Enter vendor address"
                            required
                        >{{ old('address') }}</textarea>

                    </div>



                    <!-- Bio -->

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
                            rows="3"
                            placeholder="Enter vendor bio"
                            required
                        >{{ old('bio') }}</textarea>

                    </div>



                    <!-- Logo -->

                    <div class="form-group">

                        <label>
                            Logo
                        </label>


                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >


                        <small class="text-muted">

                            Allowed:
                            JPG, JPEG, PNG, WEBP.

                            Maximum 2 MB.

                        </small>

                    </div>


                </div>



                <!-- ================================================= -->
                <!-- MODAL FOOTER -->
                <!-- ================================================= -->

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

                        Save Record

                    </button>


                </div>


            </div>


        </form>


    </div>

</div>



@endsection